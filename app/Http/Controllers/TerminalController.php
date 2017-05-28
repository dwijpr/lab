<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use stdClass;

class TerminalController extends Controller
{
    var $path = "/var/www/data";

    public function ls() {
        $directory = request()->directory;
        $path = $this->path.$directory;
        $items = scandir($path);
        $items = array_diff($items, ['.', '..']);
        $items = array_values($items);
        $_items = [];
        foreach ($items as $i => $value) {
            $item = new stdClass;
            $_path = $path.'/'.$value;
            $item->name = $value;
            $item->path = $_path;
            $item->pathinfo = pathinfo($_path);
            $item->isDir = is_dir($_path);
            $_items[] = $item;
        }
        $view = view('template.ls', [
            'items' => $_items,
        ])->render();
        return response()->json([
            'view' => $view,
        ]);
    }

    public function index() {
        return view('terminal.index');
    }
}
