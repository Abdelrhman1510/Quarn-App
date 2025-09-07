<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Radio;

class RadioController extends Controller
{
    public function index()
    {
        $radios = Radio::all();
        return view('radio', compact('radios'));
    }
}
