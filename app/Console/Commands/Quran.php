<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Storage;
use App\Sura;
use App\Quran as QuranModel;
use App\Terjemahan;
use App\Jalalayn;

class Quran extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'quran';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync from data';

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
        $sura_ars = Storage::get('/data/suras-ar.txt');
        $sura_ars = explode(PHP_EOL, $sura_ars);
        $sura_names = Storage::get('/data/suras-title.txt');
        $sura_names = explode(PHP_EOL, $sura_names);
        $data = Storage::get('/data/arrays.xml');
        $data = xml2array(simplexml_load_string($data));
        $sura_artis = xml2array($data['string-array'][26])['item'];
        $sura_count = count($sura_names);

        for ($i=1; $i <= $sura_count; $i++) { 
            $sura = Sura::updateOrCreate([
                'id' => $i,
                'name' => trim($sura_names[$i - 1], '"'),
                'arti' => trim($sura_artis[$i - 1], '"'),
                'ar' => $sura_ars[$i - 1],
            ]);
        }

        $ayas = QuranModel::all();
        $terjemahans = Terjemahan::all();
        $jalalayns = Jalalayn::all();
        $bar = $this->output->createProgressBar(count($ayas));
        foreach ($ayas as $i => $aya) {
            $sura = Sura::findOrFail($aya->sura);
            $sura_id = $aya->sura;
            $aya_id = $aya->aya;
            $terjemahan = $terjemahans->filter(
                function ($terjemahan, $key) use ($sura_id, $aya_id) {
                    return
                        $terjemahan->sura == $sura_id
                        and
                        $terjemahan->aya == $aya_id
                    ;
                }
            )->first();
            $jalalayn = $jalalayns->filter(
                function ($jalalayn, $key) use ($sura_id, $aya_id) {
                    return
                        $jalalayn->sura == $sura_id
                        and
                        $jalalayn->aya == $aya_id
                    ;
                }
            )->first();
            $data = [
                'aya_id'        => $aya->aya,
                'text'          => $aya->text,
                'terjemahan'    => $terjemahan->text,
                'jalalayn'      => $jalalayn->text,
            ];
            $aya = $sura->ayas()->updateOrCreate($data);
            $bar->advance();
        }
        $bar->finish();
    }
}
