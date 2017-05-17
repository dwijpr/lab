<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;

class CodeController extends Controller
{
    public function index() {
        $files = Storage::files('/code');
        foreach ($files as $i => $file) {
            $files[$i] = (object) pathinfo($file);
        }
        return view('code.index', [
            'files' => $files,
        ]);
    }

    public function show($path) {
        return view('code.show', [
            'path' => $path,
        ]);
    }
}
