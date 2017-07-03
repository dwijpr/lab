<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use stdClass, Exception;

class TerminalController extends Controller
{
    // var $path = "/var/www/data"; // if using docker
    var $path = "D:/workspace/quran";

    public function code() {
        $file = request()->file;
        $directory = request()->directory;
        $path = $this->path.$directory.$file;
        return response()->json([
            'content' => file_get_contents($path),
        ]);
    }

    public function cli() {
        $directory = request()->directory;
        $command = request()->command;
        $path = $this->path.$directory;
        chdir($path);
        $output = shell_exec("pwd");
        $output = shell_exec($command);
        if ($output) {
            $output = str_replace(' ', '&nbsp;', $output);
            $output = nl2br($output);
            return response()->json([
                'success' => true,
                'output' => $output,
            ]);
        }
    }

    public function mkdir() {
        $directory = request()->directory;
        $name = request()->name;
        $path = $this->path.$directory.$name;
        $response = [
            'success' => false,
        ];
        try {
            if (mkdir($path)) {
                $response = [
                    'success' => true,
                ];
            }
        } catch (Exception $e) {
            $response['error'] = $e->getMessage();
        }
        return response()->json($response);
    }

    public function data($path) {
        return response()->file($this->path.$path);
    }

    public function readme() {
        $directory = request()->directory;
        $path = $this->path.$directory;
        $readme = glob($path.'readme.*');
        if (!empty($readme)) {
            $readme = $readme[0];
            $content = file_get_contents($readme);
            if (pathinfo($readme)['extension'] == 'txt') {
                $content = str_replace(' ', '&nbsp;', $content);
                $content = nl2br($content);
            }
            $response = [
                'exists' => true,
                'view' => view('template.readme', [
                    'content' => $content,
                ])->render(),
            ];
        }
        return response()->json(@$response?:false);
    }

    public function ls() {
        $list = @request()->list;
        $onlyDir = @request()->onlyDir;
        $directory = request()->directory;
        $path = $this->path.$directory;
        $items = scandir($path);
        if (!$onlyDir) {
            $items = array_diff($items, ['.', '..']);
        }
        $items = array_values($items);
        $_items = [];
        foreach ($items as $i => $value) {
            $__path = $path.'/'.$value;
            $value = utf8_encode($value);
            $_path = $path.'/'.$value;
            $item = new stdClass;
            $item->name = addslashes($value);
            if (preg_match('/\s/',$item->name)) {
                $item->name = "'" . $item->name ."'";
            }
            $item->path = $_path;
            $item->pathinfo = pathinfo($_path);
            $item->isDir = is_dir($__path);
            if (!$item->isDir and $onlyDir) {
                continue;
            }
            $_items[] = $item;
        }

        if ($onlyDir or $list) {
            return response()->json([
                'items' => $_items,
            ]);
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
