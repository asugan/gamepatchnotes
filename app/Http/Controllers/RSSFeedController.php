<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Games;
use App\Models\Patchnotes;
use Illuminate\Http\Request;

class RSSFeedController extends Controller
{
  public function feed1()
  {
    $posts = Games::latest()->get();

    return response()->view('site/feed1', [
      'games' => $posts
    ])->header('Content-Type', 'text/xml');
  }

  public function feed2()
  {
    $posts = Patchnotes::latest()->get();

    return response()->view('site/feed2', [
      'patchnotes' => $posts
    ])->header('Content-Type', 'text/xml');
  }

    public function feed3()
  {
    $posts = Blog::latest()->get();

    return response()->view('site/feed3', [
      'patchnotes' => $posts
    ])->header('Content-Type', 'text/xml');
  }
}
