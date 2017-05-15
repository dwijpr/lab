<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;

class Dart {
    public function __construct($key) {
        $this->key = str_replace('.blade.php', '', $key);
    }
}

class DartController extends Controller
{
    public function show($key) {
        if (!@Storage::disk('dart')->exists($key.'.blade.php')) {
            return abort(404);
        }
        return view('dart.items.'.$key);
    }

    public function index() {
        $files = Storage::disk('dart')->files('/');
        $darts = [];
        foreach ($files as $file) {
            $darts[] = new Dart($file);
        }
        return view('dart.index', [
            'darts' => $darts,
        ]);
    }
}
