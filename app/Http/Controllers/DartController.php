<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DartController extends Controller
{
    public function index() {
        return view('dart.index');
    }
}
