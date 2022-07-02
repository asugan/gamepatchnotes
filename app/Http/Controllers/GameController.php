<?php

namespace App\Http\Controllers;

use App\Models\Games;
use App\Models\Patchnotes;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
        $games = Games::all();
        $patchnotes = Patchnotes::latest()->take(2)->get();

        return view('welcome', compact('games', 'patchnotes'));
    }

    public function hamham()
    {
        $hamham = Games::all();
        return view('hamham', compact('hamham'));
    }
}