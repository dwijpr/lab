<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function sqlite() {
        if (request()->method() === 'POST') {}
        return view('upload.sqlite');
    }
}
