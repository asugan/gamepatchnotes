<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Games;
use App\Models\Patchnotes;
use Illuminate\Http\Request;

class SitemapController extends Controller
{
  public function index(Request $r)
  {

    $posts = Games::orderBy('id', 'desc')->get();

    return response()->view('site.sitemap', compact('posts'))
      ->header('Content-Type', 'text/xml');
  }

  public function index2(Request $r)
  {

    $pnotes = Patchnotes::orderBy('id', 'desc')->get();

    return response()->view('site.sitemap2', compact('pnotes'))
      ->header('Content-Type', 'text/xml');
  }

    public function index3(Request $r)
  {

    $pnotes = Blog::orderBy('id', 'desc')->get();

    return response()->view('site.sitemap2', compact('pnotes'))
      ->header('Content-Type', 'text/xml');
  }
}
