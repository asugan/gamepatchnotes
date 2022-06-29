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
        $latestgame = Games::latest()->take(4)->get();

        return view('welcome', compact('games','latestgame','patchnotes'));
    }

    public function hamham()
    {
        $hamham = Games::all();
        return view('hamham', compact('hamham'));
    }
}
