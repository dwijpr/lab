<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArabController extends Controller
{
    public function index() {
        return view('islam.arab.index');
    }

    public function topik($number) {
        return view('islam.arab.topik.'.$number);
    }
}
