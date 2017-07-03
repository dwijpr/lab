<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IslamController extends Controller
{
    public function index() {
        return view('islam.index');
    }
}
