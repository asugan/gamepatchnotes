<?php

namespace App\Http\Controllers;

use App\Models\Patchnotes;
use Illuminate\Http\Request;
use App\Helper\File;

class AdminPostController extends Controller
{
    use File;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Patchnotes::latest()->paginate(10);

        return view('admin.adminpatchnotes.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.adminpatchnotes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($file = $request->file('post_image')) {
            $path = 'patchnotes/images';
            $url = $this->file($file, $path, 300, 400);
        }

        $data = new Patchnotes([
            'post_title' => $request->post_title,
            'post_body' => $request->post_body,
            'games_id' => $request->games_id,
            'post_image' => $url,
        ]);

        $data->save();

        return redirect()->route('patchnotes.index')
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
        return view('admin.adminpatchnotes.show', [
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
        return view('admin.adminpatchnotes.edit', [
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

        if ($file = $request->file('post_image')) {
            unlink("storage/" . $post->post_image);
            $path = 'patchnotes/images';
            $url = $this->file($file, $path, 300, 400);
        } elseif ($request->file('post_image') == null) {
            $url = $post->post_image;
        }

        $post->update([
            'post_title' => $request->post_title,
            'post_body' => $request->post_body,
            'games_id' => $request->games_id,
            'post_image' => $url,
        ]);

        return redirect()->route('patchnotes.index')
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
        unlink("storage/" . $post->post_image);
        $post->delete();

        return redirect()->route('patchnotes.index')
            ->withSuccess(__('Post deleted successfully.'));
    }
}
