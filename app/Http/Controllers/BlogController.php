<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Helper\File;

class BlogController extends Controller
{
  use File;

  public function index()
  {
    $posts = Blog::latest()->paginate(10);

    return view('admin.blog.index', compact('posts'));
  }

  public function allblog()
  {

    $posts = Blog::latest()->paginate(8);

    return view('site.blog', compact('posts'));
  }

  public function storeImage(Request $request)
  {
    if ($request->hasFile('upload')) {
      $originName = $request->file('upload')->getClientOriginalName();
      $fileName = pathinfo($originName, PATHINFO_FILENAME);
      $extension = $request->file('upload')->getClientOriginalExtension();
      $fileName = $fileName . '_' . time() . '.' . $extension;

      $request->file('upload')->move(public_path('media'), $fileName);

      $url = asset('media/' . $fileName);
      return response()->json(['fileName' => $fileName, 'uploaded' => 1, 'url' => $url]);
    }
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('admin.blog.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {

    if ($file = $request->file('image')) {
      $path = 'blog/images';
      $url = $this->file($file, $path, 1200, 630);
    } else {
      $url = $request->image;
    }

    $data = new Blog([
      'blog_title' => $request->blog_title,
      'blog_body' => $request->blog_body,
      'blog_description' => $request->blog_description,
      'image' => $url,
    ]);

    $data->save();

    return redirect()->route('blog.index')
      ->withSuccess(__('Post created successfully.'));
  }

    /**
   * Display the specified resource.
   *
   * @param  \App\Models\Blog  $post
   * @return \Illuminate\Http\Response
   */
  public function showblog(Blog $post)
  {
    return view('site.blogpage', [
      'post' => $post
    ]);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Blog  $post
   * @return \Illuminate\Http\Response
   */
  public function show(Blog $post)
  {
    return view('admin.blog.show', [
      'post' => $post
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Post  $post
   * @return \Illuminate\Http\Response
   */
  public function edit(Blog $post)
  {
    return view('admin.blog.edit', [
      'post' => $post
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Blog  $post
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Blog $post)
  {

    $post->update([
      'blog_title' => $request->blog_title,
      'blog_body' => $request->blog_body,
      'blog_description' => $request->blog_description,
    ]);

    return redirect()->route('blog.index')
      ->withSuccess(__('Post updated successfully.'));
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Blog  $post
   * @return \Illuminate\Http\Response
   */
  public function destroy(Blog $post)
  {
    unlink("storage/" . $post->image);


    $post->delete();

    return redirect()->route('blog.index')
      ->withSuccess(__('Post deleted successfully.'));
  }
}
