<?php

namespace App\Http\Controllers;

use App\Models\Games;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function Search(Request $request)
    {
        $q = $request->input('search');
        $results = Games::where('game_name', 'LIKE', '%' . $q . '%')->with(['patchnotes' => function ($q) {
            $q->latest();
        }])
            ->paginate(10);


        return view('site.results', compact('results'));
    }
}
