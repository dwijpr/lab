<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use App\Dart;

class DartController extends Controller
{
    public function sync() {
        if (!$this->loadData()) {
            foreach ($this->files as $file) {
                $key = str_replace('.blade.php', '', $file);
                $dart = Dart::where('key', $key)->get()->first();
                if (!$dart) {
                    Dart::create([
                        'key' => $key,
                        'title' => ucwords(implode(' ', explode('_', $key))),
                    ]);
                }
            }
        }
        return redirect('/dart');
    }

    public function show($key) {
        if (!@Storage::disk('dart')->exists($key.'.blade.php')) {
            return abort(404);
        }
        return view('dart.items.'.$key);
    }

    public function index() {
        $error = false;
        if (!$this->loadData()) {
            $error = true;
        }
        return view('dart.index', [
            'error' => $error,
            'darts' => $this->darts,
        ]);
    }

    function loadData() {
        $this->files = Storage::disk('dart')->files('/');
        $this->darts = Dart::all(); 
        return count($this->files) === count($this->darts);
    }
}
