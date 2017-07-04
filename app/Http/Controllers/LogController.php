<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Log;

class LogController extends Controller
{
    public function index() {
        $logs = Log::orderBy('id', 'desc')->get();
        return view('log.index', [
            'logs' => $logs,
        ]);
    }
}
