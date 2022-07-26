<?php

namespace App\Http\Controllers;

use App\Models\Games;
use App\Models\Patchnotes;
use Illuminate\Http\Request;

class SitemapController extends Controller
{
    public function index(Request $r)
    {

        $posts = Games::orderBy('id', 'desc')->get();
        $pnotes = Patchnotes::orderBy('id', 'desc')->get();

        return response()->view('site.sitemap', compact('posts', 'pnotes'))
            ->header('Content-Type', 'text/xml');
    }
}
