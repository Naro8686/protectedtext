<?php

namespace App\Jobs;

use App\Models\Bip;
use App\Models\Note;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Throwable;

class CheckBipsJob implements ShouldQueue, ShouldBeUnique
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var integer $id
     */
    public $id;


    /**
     * Create a new job instance.
     *
     * @param  int  $noteId
     *
     * @return void
     */
    public function __construct(int $noteId)
    {
        $this->id = $noteId;
    }

    /**
     * The unique ID of the job.
     *
     * @return string
     */
    public function uniqueId()
    {
        return $this->id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            if ($note = Note::withTrashed()->find($this->id)) {
                $bips1 = Cache::rememberForever('bips-1', function() {
                    return Bip::whereNum(1)->pluck('text')->toArray();
                });

                $bips2 = Cache::rememberForever('bips-2', function() {
                    return Bip::whereNum(2)->pluck('text')->toArray();
                });

                $bips3 = Cache::rememberForever('bips-3', function() {
                    return Bip::whereNum(3)->pluck('text')->toArray();
                });

                $text = preg_replace('/[^\p{L}\p{N}\s]/u', '',
                    $note->text->implode(' '));
                $words = preg_split('/\s+/', $text, -1);
                $noteWords = array_map('strtolower',
                    is_array($words) ? $words : [$words]);

                $data = [];

                $bip1Texts = array_values(array_intersect($noteWords,
                    is_array($bips1) ? $bips1 : [$bips1]));
                if (!empty($bip1Texts)) {
                    $bip1Texts = array_unique($bip1Texts);
                    $count1 = count($bip1Texts);
                    $data['bip_1_text'] = implode(', ', $bip1Texts);
                    $data['has_bip_1'] = in_array($count1, [12, 15, 18, 21, 24])
                        ? 1 : 0;
                    $data['bip_1_count'] = $count1;
                }

                $bip2Texts = array_values(array_intersect($noteWords,
                    is_array($bips2) ? $bips2 : [$bips2]));
                if (!empty($bip2Texts)) {
                    $bip2Texts = array_unique($bip2Texts);
                    $count2 = count($bip2Texts);
                    $data['bip_2_text'] = implode(', ', $bip2Texts);
                    $data['has_bip_2'] = in_array($count2, [12]) ? 1 : 0;
                    $data['bip_2_count'] = $count2;
                }

                $bip3Texts = array_values(array_intersect($noteWords,
                    is_array($bips3) ? $bips3 : [$bips3]));
                if (!empty($bip3Texts)) {
                    $bip3Texts = array_unique($bip3Texts);
                    $count3 = count($bip3Texts);
                    $data['bip_3_text'] = implode(', ', $bip3Texts);
                    $data['has_bip_3'] = in_array($count3, [13, 25]) ? 1 : 0;
                    $data['bip_3_count'] = $count3;
                }

                $data['bip_1_checked'] = 1;
                $data['bip_2_checked'] = 1;
                $data['bip_3_checked'] = 1;
                $note->update($data);
            }
        } catch (Throwable $throwable) {
            Log::error(__METHOD__.' - '.$throwable->getMessage().' - '
                .$throwable->getLine());
        }
    }
}
