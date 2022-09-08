<?php

namespace App\Http\Controllers;

use App\Models\Games;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DescriptionController extends Controller
{
    public function description()
    {
        $gameall = Games::all('id');

        foreach ($gameall as $hamham) {
            $ids = array($hamham->id);

            foreach ($ids as $q) {
                $hamham_response = Http::acceptJson()->get('https://store.steampowered.com/api/appdetails?appids=' . $q);
                $response2 = json_decode($hamham_response);
                foreach ((array) $response2 as $game) {
                    if (empty($game->data->short_description)) {
                        $gameinfo = 'No description...';
                    } else {
                        $gameinfo = $game->data->short_description;
                    };
                    $game_image = 'https://cdn.cloudflare.steamstatic.com/steam/apps/' . $q . '/capsule_sm_120.jpg';
                    $type = 'Game';
                    $website = $game->data->website;
                    $bg_image = $game->data->background;

                    Games::find($q)->update([
                        'description' => $gameinfo,
                        'type' => $type,
                        'short_image' => $game_image,
                        'website' => $website,
                        'background_image' => $bg_image,
                    ]);
                }
            }
        }
        return redirect()->route('home.index');
    }
}
