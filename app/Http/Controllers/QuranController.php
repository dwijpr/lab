<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sura;
use App\Aya;

class QuranController extends Controller
{
    public function index() {
        $suras = Sura::all();
        $aya_count = Aya::count();
        return view('islam.quran.index', [
            'suras' => $suras,
            'aya_count' => $aya_count,
        ]);
    }
}
