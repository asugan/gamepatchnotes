<?php

namespace App\Http\Controllers;

use App\Models\Games;
use App\Models\Patchnotes;
use Illuminate\Http\Request;

class SearchController extends Controller
{
  public function Search(Request $request)
  {
    $q = $request->input('search');
    $results = Games::where('game_name', 'LIKE', '%' . $q . '%')->with(['patchnotes' => function ($q) {
      $q->latest();
    }])
      ->paginate(30);
    $results->appends(['search' => $q]);


    return view('site.results', compact('results'));
  }

  public function Patchnote(Request $request)
  {
    $q = $request->input('search');
    $results = Patchnotes::where('post_title', 'LIKE', '%' . $q . '%')
      ->paginate(10);
    $results->appends(['search' => $q]);


    return view('site.patchnoteresults', compact('results'));
  }

  public function autocomplete(Request $request)
  {
    $data = Games::select("game_name as value", "id")
      ->where('game_name', 'LIKE', '%' . $request->get('search') . '%')->take(15)
      ->get();

    return response()->json($data);
  }
}
