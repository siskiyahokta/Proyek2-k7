<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
        // Data game saat ini masih dummy di view.
        // Jika ingin mem-pass dari controller: return view('games.index', compact('games'));
        return view('games.index');
    }
}
