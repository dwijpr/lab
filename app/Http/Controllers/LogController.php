<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Log;

class LogController extends Controller
{
    public function index() {
        $logs_grouped = Log::orderBy('created_at', 'desc')->get()
            ->groupBy('ip');
        return view('log.index', [
            'logs_grouped' => $logs_grouped,
        ]);
    }
}
