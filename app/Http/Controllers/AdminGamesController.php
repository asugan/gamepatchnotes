<?php

namespace App\Http\Controllers;

use App\Models\Games;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Helper\File;


class AdminGamesController extends Controller
{
    use File;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Games::latest()->paginate(10);

        return view('admin.admingames.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.admingames.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($file = $request->file('game_image')) {
            $path = 'games/images';
            $url = $this->file($file, $path, 300, 400);
        }

        $data = new Games([
            'game_name' => $request->game_name,
            'game_platform' => $request->game_platform,
            'release_date' => $request->release_date,
            'genre' => $request->genre,
            'developer' => $request->developer,
            'recommended' => $request->recommended,
            'game_image' => $url,
        ]);

        $data->save();

        return redirect()->route('games.index')
            ->withSuccess(__('Games created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Games  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Games $post)
    {
        return view('admin.admingames.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Games  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Games $post)
    {
        return view('admin.admingames.edit', [
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Games  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Games $post)
    {

        if ($file = $request->file('game_image')) {
            unlink("storage/" . $post->game_image);
            $path = 'games/images';
            $url = $this->file($file, $path, 300, 400);
        } elseif ($request->file('game_image') == null) {
            $url = $post->game_image;
        }

        $post->update([
            'game_name' => $request->game_name,
            'game_platform' => $request->game_platform,
            'release_date' => $request->release_date,
            'genre' => $request->genre,
            'developer' => $request->developer,
            'recommended' => $request->recommended,
            'game_image' => $url,
        ]);

        return redirect()->route('games.index')
            ->withSuccess(__('Post updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Games  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Games $post)
    {
        unlink("storage/" . $post->game_image);

        $post->delete();

        return redirect()->route('games.index')
            ->withSuccess(__('Post deleted successfully.'));
    }
}
