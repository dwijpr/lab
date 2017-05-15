<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;

class DartController extends Controller
{
    public function index() {
        // $files = Storage::disk('dart')->files('/');
        return view('dart.items.notes');
    }
}
