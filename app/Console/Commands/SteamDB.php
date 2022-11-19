<?php

namespace App\Console\Commands;

use App\Models\Games;
use App\Models\Patchnotes;
use Illuminate\Support\Facades\Http;
use Illuminate\Console\Command;

class SteamDB extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'steamdb:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Steamdb command';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $hamham_response = HTTP::acceptJson()->get('https://steamdbapi.herokuapp.com/steamdb');
        $response2 = json_decode($hamham_response);

        foreach ($response2 as $q) {

            $hamham_response2 = HTTP::acceptJson()->get('https://api.steampowered.com/ISteamNews/GetNewsForApp/v0002/?appid=' . $q->appid . '&count=1&maxlength=0&feeds=steam_community_announcements');
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
                                    if (empty($game->data->short_description)) {
                                        $gameinfo = 'No description...';
                                    } else {
                                        $gameinfo = $game->data->short_description;
                                    };
                                    $short_image = 'https://cdn.cloudflare.steamstatic.com/steam/apps/' . $game->data->steam_appid . '/capsule_sm_120.jpg';
                                    $type = 'Game';
                                    if (empty($game->data->website)) {
                                        $website = 'https://www.google.com/search?q=' . $developer;
                                    } else {
                                        $website = $game->data->website;
                                    }
                                    if (empty($game->data->background)) {
                                        $bg_image = 'https://t3.ftcdn.net/jpg/02/10/55/60/360_F_210556027_pNmg4EUFwrn2W25SDdWayPakVIztTSe8.jpg';
                                    } else {
                                        $bg_image = $game->data->background;
                                    }
                                    $data = new Games([
                                        'game_name' => $game->data->name,
                                        'id' => $game->data->steam_appid,
                                        'game_image' => $game->data->header_image,
                                        'release_date' => $game->data->release_date->date,
                                        'game_platform' => 'PC',
                                        'genre' => $genre,
                                        'developer' => $developer,
                                        'description' => $gameinfo,
                                        'type' => $type,
                                        'short_image' => $short_image,
                                        'website' => $website,
                                        'background_image' => $bg_image,
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
        $this->info('Steamdb basariyla tarandi');
    }
}
