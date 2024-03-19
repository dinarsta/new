<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PolyController extends Controller
{
    public function index()
    {
        $polies = Polies::with('dokters')->get();
        return view('polies.index', compact('polies'));
    }
}
