<?php

namespace App\Http\Controllers;

use App\Models\Games;
use App\Models\Patchnotes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SteamApiController extends Controller
{
    public function topla()
    {
        $hamham_response = HTTP::acceptJson()->get('https://hamhamapi.herokuapp.com/steamdb');
        $response2 = json_decode($hamham_response);

        foreach ($response2 as $q) {

            $hamham_response2 = HTTP::acceptJson()->get('https://api.steampowered.com/ISteamNews/GetNewsForApp/v0002/?appid=' . $q->appid . '&count=1&maxlength=0&format=json&tags=patchnotes');
            $response3 = json_decode($hamham_response2);
            $game_image = 'https://cdn.cloudflare.steamstatic.com/steam/apps/' . $q->appid . '/capsule_231x87.jpg';
            if ($game_image === null) {
                $game_image = 'https://steamdb.info/static/img/applogo.svg';
            };

            foreach ($response3 as $patchnote) {

                if (count($patchnote->newsitems) > 0) {

                    $validate = (Patchnotes::where('post_title', $patchnote->newsitems[0]->title))->first();
                    if ($validate === null) {

                        $api_response = HTTP::acceptJson()->get('https://store.steampowered.com/api/appdetails?appids=' . $q->appid);
                        $response = json_decode($api_response);

                        foreach ((array) $response as $game) {

                            if (!empty($game->data)) {
                                $validate = (Games::where('id', $game->data->steam_appid))->first();
                                if ($validate === null) {
                                    if (empty($game->data->genres[0])) {
                                        $genre = 'No Info';
                                    } else {
                                        $genre = $game->data->genres[0]->description;
                                    }
                                    if (empty($game->data->developers[0])) {
                                        $developer = 'No Info';
                                    } else {
                                        $developer = $game->data->developers[0];
                                    }
                                    $data = new Games([
                                        'game_name' => $game->data->name,
                                        'id' => $game->data->steam_appid,
                                        'game_image' => $game->data->header_image,
                                        'release_date' => $game->data->release_date->date,
                                        'game_platform' => 'PC',
                                        'genre' => $genre,
                                        'developer' => $developer,
                                    ]);
                                    $data->save();
                                }
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
        }

        return redirect()->route('home.index');
    }
}
