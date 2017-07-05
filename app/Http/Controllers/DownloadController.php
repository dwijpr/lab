<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DownloadController extends Controller
{
    public function sqlite() {
        return response()->download(
            database_path('database.sqlite')
            , 'db-' . date('Y-m-d--H-i-s') . '.sqlite'
        );
    }
}
