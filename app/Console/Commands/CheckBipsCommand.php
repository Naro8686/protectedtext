<?php

namespace App\Console\Commands;

use App\Jobs\CheckBipsJob;
use App\Models\Note;
use Illuminate\Console\Command;

class CheckBipsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:bips';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Note::withTrashed()
            ->where(function ($query) {
                $query
                    ->where('bip_1_checked', 0)
                    ->orWhere('bip_2_checked', 0)
                    ->orWhere('bip_3_checked', 0);
            })
            ->orderByDesc('id')
            ->chunk(15000, function ($notes) {
                foreach ($notes as $note) {
                    dispatch(new CheckBipsJob($note->id));
                }
            });
        return 0;
    }
}
