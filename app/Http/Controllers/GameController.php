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
        $user = Auth::id();

        $games = Games::where('recommended', 'on')->get();

        $likedgames = Games::with(['patchnotes' => function ($q) {
            $q->latest();
        }])
            ->whereLikedBy($user)
            ->get();

        $latest = Games::with(['patchnotes' => function ($q) {
            $q->latest();
        }])
            ->latest()
            ->get();

        return view('site.index', compact('games', 'likedgames', 'latest'));
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
        return view('site.patchnotepage', ['patchnote' => $patchnote]);
    }

    public function showcategory(Games $game)
    {
        $post = $game->patchnotes()->paginate(5);

        return view('site.gamepage', ['game' => $game, 'patchnote' => $post]);
    }

    public function allgames()
    {

        $games = Games::with(['patchnotes' => function ($q) {
            $q->latest();
        }])->paginate(10);

        return view('site.allgames', compact('games'));
    }

    public function followedgames()
    {
        $user = Auth::id();

        $games = Games::with(['patchnotes' => function ($q) {
            $q->latest();
        }])
            ->whereLikedBy($user)
            ->paginate(10);

        return view('site.allfavgames', compact('games'));
    }
}
