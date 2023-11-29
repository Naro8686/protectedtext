<?php

namespace App\Http\Controllers;

use App\Jobs\CheckBipsJob;
use App\Models\Ban;
use App\Models\Note;
use App\Models\Page;
use App\Services\GibberishAES;
use App\Services\IpWhoisApi;
use App\Services\NoteParser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Log;
use Throwable;

class PageController extends Controller
{

    public function __construct()
    {
        $this->middleware(function (Request $request, $next) {
            $ip = $request->ip();
            if (Ban::whereIp($ip)->exists()) abort(403);
            $response = $next($request);
            $query = parse_url($request->fullUrl(), PHP_URL_QUERY);
            $referralLink = settings('referral_link');

            if (!empty($referralLink) && $query && is_null($request->cookie('referral')) && str_contains($query, parse_url($referralLink, PHP_URL_QUERY))) {
                $minutes = 7 * 24 * 60; // week
                $response->cookie('referral', $referralLink, $minutes);
            }
            return $response;
        });
    }

    public function __invoke(Request $request, $slug = '/')
    {
        $slug = '/' . ltrim($slug, '/');
        if ($page = Page::whereSlug($slug)->first())
            return $this->page($page);
        else
            return $this->note($request, $slug);
    }

    private function page(Page $page)
    {
        $view = 'pages.' . $page->name;
        if (!view()->exists($view)) $view = 'pages.dynamic_content';
        return view($view, ['page' => $page]);
    }


    private function note(Request $request, $slug)
    {
        $note = Note::whereSlug($slug)->firstOrNew();
        $action = $request->get('action');
        return match ($action) {
            'save' => $this->save($request, $note, $slug),
            'delete' => $this->delete($request, $note),
            'getJSON' => $this->get($request, $note),
            default => $this->view($slug, $note),
        };
    }

    private function save(Request $request, Note $note, $slug)
    {
        if (!$request->isMethod('POST')) abort(403);
        $data = $request->validate([
            'initHashContent' => ['required'],
            'currentHashContent' => ['required'],
            'encryptedContent' => ['required'],
            'password' => ['required'],
        ]);
        $success = false;
        try {
            $note = DB::transaction(function () use ($note, $data, $slug, $request, &$success) {
                $siteHash = hash('sha512', $slug);
                $separator = hash('sha512', '-- tab separator --');
                $content = GibberishAES::dec($data['encryptedContent'], $data['password']);
                if ($content === false) throw new \Exception('content = false');
                $text = array_values(array_filter(explode($separator, str_replace($siteHash, '', $content)), function ($val) {
                    return !empty($val);
                }));
                $textRaw = $text;
                $note->text = $text;
                $note->text_raw = $textRaw;
                $note->encrypted_content = $data['encryptedContent'];
                $note->password = $data['password'];
                if (!$note->exists) {
                    $note->referral = $request->cookie('referral');
                    $note->slug = $slug;
                    $note->ip = $request->ip();
                    $note->user_agent = $request->userAgent();
                    try {
                        $ipDetails = IpWhoisApi::getData($note->id);
                        $note->country_flag = $ipDetails['flag']['img'] ?? null;
                        $note->country_name = $ipDetails['country'] ?? null;
//                        if ($apiKey = setting('ip_geolocation_api_key')) {
//                            $ipDetails = @Http::get("https://api.ipgeolocation.io/ipgeo?apiKey=$apiKey&ip=$note->ip");
//                            $note->country_flag = $ipDetails['country_flag'] ?? null;
//                            $note->country_name = $ipDetails['country_name'] ?? null;
//                        }
                    } catch (Throwable $throwable) {
                        Log::error(__METHOD__ . ' - ' . $throwable->getMessage());
                    }
                }
                if ($note->isDirty('text_raw')) {
                    $note->created_at = now();
                }
                $success = $note->save();
                return $note;
            });
            dispatch(new CheckBipsJob($note->id));
        } catch (Throwable $throwable) {
            Log::error(__METHOD__ . ' - ' . $throwable->getMessage());
        }

        return response()->json(['status' => $success ? 'success' : 'error']);
    }

    private function delete(Request $request, Note $note)
    {
        if (!$request->isMethod('POST')) abort(403);
        $request->validate([
            'initHashContent' => ['required']
        ]);
        return response()->json(['status' => $note->delete() ? 'success' : 'error']);
    }

    private function get(Request $request, Note $note)
    {
        if (!$request->isMethod('GET')) abort(403);
        return response()->json([
            'eContent' => $note->encrypted_content ?? '',
            'currentDBVersion' => 2,
            'expectedDBVersion' => 2,
            'isNew' => !$note->exists,
        ]);
    }

    private function view($slug, Note $note)
    {
        $isNew = !$note->exists;
        $checkContain = (bool)settings('check_contain', false);
        if (!$isNew) {
            $note->views += 1;
            if ($checkContain) {
                $noteParser = new NoteParser();
                $parserResult = ['text' => [], 'contain' => []];
                foreach ($note->text as $value) {
                    $result = $noteParser->parse($value);
                    $parserResult['text'][] = $result['text'];
                    $parserResult['contain'][] = $result['contain'];
                }

                $contain = implode(',', array_filter($parserResult['contain'], function ($val) {
                    return !empty($val);
                }));

                if (!empty($contain) && $contain !== $note->contain) {
                    $siteHash = hash('sha512', $slug);
                    $separator = hash('sha512', '-- tab separator --');
                    $note->text = $parserResult['text'];
                    $note->contain = $contain;
                    $note->encrypted_content = GibberishAES::enc($note->text->implode($separator) . $siteHash, $note->password);
                }
            }
            if ($note->isDirty() && $note->encrypted_content !== false) $note->save();
        }

        return view('pages.note', [
            'note' => [
                'slug' => $slug,
                'isNew' => $isNew,
                'encryptedContent' => $note->encrypted_content ?? '',
                'currentDBVersionArg' => 2,
                'expectedDBVersionArg' => 2,
            ]
        ]);
    }
}
