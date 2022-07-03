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
    public function showpatchnote(Patchnotes $patchnote)
    {
        return view('patchnotepage', ['patchnote' => $patchnote]);
    }
    public function showcategory(Games $game)
    {
        $post = $game->patchnotes()->paginate(9);

        return view('gamepage', ['game' => $game, 'patchnote' => $post]);
    }
}