<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Kata;
use App\Aya;

class QuranWord extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'quran:word';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync Words';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $words = Kata::all();
        $bar = $this->output->createProgressBar(count($words));
        foreach ($words as $i => $word) {
            $ayas = Aya::where([
                'sura_id' => $word->sura,
                'aya_id' => $word->aya,
            ])->get();
            if (count($ayas) > 1) {
                $this->error('found more than unique aya!');
                return;
            }
            $aya = $ayas->first();
            if (!$aya) {
                $this->error('the aya is not found!');
                return;
            }
            $data = [
                'number' => $word->word,
                'ar' => $word->ar,
                'tr' => $word->tr,
            ];
            $aya->words()->create($data);
            $bar->advance();
        }
        $bar->finish();
    }
}
