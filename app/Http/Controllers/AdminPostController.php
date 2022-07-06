<?php

namespace App\Http\Controllers;

use App\Models\Patchnotes;
use Illuminate\Http\Request;

class AdminPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Patchnotes::latest()->paginate(10);

        return view('adminpatchnotes.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminpatchnotes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Patchnotes::create(array_merge($request->only('title', 'description', 'body'), [
            'user_id' => auth()->id()
        ]));

        return redirect()->route('adminpatchnotes.index')
            ->withSuccess(__('Post created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Patchnotes  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Patchnotes $post)
    {
        return view('adminpatchnotes.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Patchnotes $post)
    {
        return view('adminpatchnotes.edit', [
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Patchnotes  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patchnotes $post)
    {
        $post->update($request->only('title', 'description', 'body'));

        return redirect()->route('adminpatchnotes.index')
            ->withSuccess(__('Post updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Patchnotes  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patchnotes $post)
    {
        $post->delete();

        return redirect()->route('adminpatchnotes.index')
            ->withSuccess(__('Post deleted successfully.'));
    }
}