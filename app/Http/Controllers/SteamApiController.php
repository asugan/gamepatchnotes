<?php

namespace App\Http\Controllers;

use App\Models\Games;
use App\Models\Patchnotes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SteamApiController extends Controller
{
    public function topla(Request $request)
    {
        $hamham_response = HTTP::acceptJson()->get('https://hamhamapi.herokuapp.com/steamdb');
        $response2 = json_decode($hamham_response);

        foreach ($response2 as $gameid) {

            $array = array($gameid->appid);

            foreach ($array as $q) {

                $api_response = HTTP::acceptJson()->get('https://store.steampowered.com/api/appdetails?appids=' . $q);
                $response = json_decode($api_response);
                $hamham_response2 = HTTP::acceptJson()->get('https://api.steampowered.com/ISteamNews/GetNewsForApp/v0002/?appid=' . $q . '&count=1&maxlength=0&format=json&tags=patchnotes');
                $response3 = json_decode($hamham_response2);
                $game_image = 'https://cdn.cloudflare.steamstatic.com/steam/apps/' . $q . '/capsule_231x87.jpg';
                if ($game_image === null) {
                    $game_image = 'https://steamdb.info/static/img/applogo.svg';
                };
                $spacer_size = 8; // increment me until it works
                echo str_pad('', (1024 * $spacer_size), "\n"); // send 8kb of new line to browser (default), just make sure that this new line will not affect your code.
                // if you have output compression, make sure your data will reach >8KB.

                if (ob_get_level()) ob_end_clean(); // end output buffering

                foreach ($response3 as $patchnote) {

                    if (count($patchnote->newsitems) > 0) {

                        $validate = (Patchnotes::where('post_title', $patchnote->newsitems[0]->title))->first();
                        if ($validate === null) {

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
        }

        return redirect()->route('home.index');
    }
}
