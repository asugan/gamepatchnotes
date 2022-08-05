<?php

namespace App\Http\Controllers;

use App\Models\Games;
use App\Models\Patchnotes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class NewApiController extends Controller
{
    public function topla()
    {
        $gameall = Games::all('id');

        foreach ($gameall as $hamham) {
            $ids = array($hamham->id);

            foreach ($ids as $q) {
                $hamham_response = HTTP::acceptJson()->get('https://api.steampowered.com/ISteamNews/GetNewsForApp/v0002/?appid=' . $q . '&count=1&maxlength=0&format=json&tags=patchnotes');
                $response2 = json_decode($hamham_response);
                $game_image = 'https://cdn.cloudflare.steamstatic.com/steam/apps/' . $q . '/capsule_231x87.jpg';
                if ($game_image === null) {
                    $game_image = 'https://steamdb.info/static/img/applogo.svg';
                };
                foreach ($response2 as $patchnote) {

                    if (count($patchnote->newsitems) > 0) {

                        $validate = (Patchnotes::where('post_title', $patchnote->newsitems[0]->title))->first();
                        if ($validate === null) {
                            $data2 = new Patchnotes([
                                'post_title' => $patchnote->newsitems[0]->title,
                                'post_body' => $patchnote->newsitems[0]->contents,
                                'games_id' => $patchnote->newsitems[0]->appid,
                                'post_image' => $game_image,
                            ]);

                            $data2->save();
                        }
                    }
                }
            }
        }

        return redirect()->route('home.index');
    }

    public function post(Request $request)
    {
        $q = $request->input('gameid');
        $api_response = HTTP::acceptJson()->get('https://store.steampowered.com/api/appdetails?appids=' . $q);
        $response = json_decode($api_response);

        foreach ((array) $response as $game) {

            if (!empty($game->data)) {
                $request->hamham1 = $game->data->name;
                $validate = (Games::where('game_name', $request->hamham1))->first();
                if ($validate === null) {
                    $request->hamham2 = $game->data->steam_appid;
                    $request->hamham3 = $game->data->header_image;
                    $request->hamham4 = $game->data->release_date->date;
                    if (empty($game->data->genres[0])) {
                        $request->hamham5 = 'No Info';
                    } else {
                        $request->hamham5 = $game->data->genres[0]->description;
                    }
                    if (empty($game->data->developers[0])) {
                        $request->hamham6 = 'No Info';
                    } else {
                        $request->hamham6 = $game->data->developers[0];
                    }
                    $data = new Games([
                        'game_name' => $request->hamham1,
                        'id' => $request->hamham2,
                        'game_image' => $request->hamham3,
                        'release_date' => $request->hamham4,
                        'game_platform' => 'PC',
                        'genre' => $request->hamham5,
                        'developer' => $request->hamham6,
                    ]);
                    $data->save();
                }
            }
        }

        return redirect()->route('home.index');
    }
}
