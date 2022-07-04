<?php

namespace App\Http\Controllers;

use App\Models\Games;
use App\Models\Patchnotes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
{
    public function index()
    {
        $games = Games::all();
        $patchnotes = Patchnotes::latest()->take(2)->get();
        $user = Auth::id();
        $likedgames = Games::whereLikedBy($user)
            ->with('likeCounter')
            ->get();

        return view('welcome', compact('games', 'patchnotes', 'likedgames'));
    }

    public function likePost($id)
    {
        $post = Games::find($id);
        $post->like();
        $post->save();

        return redirect()->route('welcome')->with('message', 'Post Like successfully!');
    }

    public function unlikePost($id)
    {
        $post = Games::find($id);
        $post->unlike();
        $post->save();

        return redirect()->route('welcome')->with('message', 'Post Like undo successfully!');
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