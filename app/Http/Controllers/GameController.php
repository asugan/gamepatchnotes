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

        $games = Games::where('recommended', 'on')->take(10)->get();

        $gamecount = Games::all()->count();
        $patchnotescount = Patchnotes::all()->count();

        $latest = Games::with(['patchnotes' => function ($q) {
            $q->latest();
        }])
            ->latest()
            ->take(12)
            ->get();

        $hamham = Patchnotes::latest()->take(12)->get();

        return view('site.index', compact('games', 'latest', 'gamecount', 'patchnotescount', 'hamham'));
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
        $game = Games::where('id', $patchnote->games_id)->first();

        return view('site.patchnotepage', ['patchnote' => $patchnote, 'game' => $game]);
    }

    public function showcategory(Games $game)
    {
        $post = $game->patchnotes()->latest()->paginate(4);

        return view('site.gamepage', ['game' => $game, 'patchnotes' => $post]);
    }

    public function allgames()
    {

        $games = Games::with(['patchnotes' => function ($q) {
            $q->latest();
        }])->paginate(30);

        $gamecount = Games::all()->count();

        return view('site.allgames', compact('games', 'gamecount'));
    }

    public function followedgames()
    {
        $user = Auth::id();

        $games = Games::with(['patchnotes' => function ($q) {
            $q->latest();
        }])
            ->whereLikedBy($user)
            ->paginate(30);

        $gamecount = Games::whereLikedBy($user)->count();

        return view('site.allfavgames', compact('games', 'gamecount'));
    }

    public function latestpatchnotes()
    {

        $hamham = Patchnotes::latest()->paginate(30);
        $patchnotescount = Patchnotes::all()->count();

        return view('site.latestpatchnotes', compact('hamham', 'patchnotescount'));
    }
}
