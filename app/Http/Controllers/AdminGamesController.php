<?php

namespace App\Http\Controllers;

use App\Models\Games;
use Illuminate\Http\Request;

class AdminGamesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Games::latest()->paginate(10);

        return view('admingames.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admingames.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Games::create(array_merge($request->only('title', 'description', 'body'), [
            'user_id' => auth()->id()
        ]));

        return redirect()->route('admingames.index')
            ->withSuccess(__('Post created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Games  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Games $post)
    {
        return view('admingames.show', [
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
        return view('admingames.edit', [
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
        $post->update($request->only('title', 'description', 'body'));

        return redirect()->route('admingames.index')
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
        $post->delete();

        return redirect()->route('admingames.index')
            ->withSuccess(__('Post deleted successfully.'));
    }
}