@php

function strip_tags_content($string)
{
    // ----- remove HTML TAGs -----
    $string = preg_replace('/<[^>]*>/', ' ', $string);
    // ----- remove control characters -----
    $string = str_replace("\r", '', $string);
    $string = str_replace("\n", ' ', $string);
    $string = str_replace("\t", ' ', $string);
    // ----- remove multiple spaces -----
    $string = trim(preg_replace('/ {2,}/', ' ', $string));
    return $string;
}

$description = Illuminate\Support\Str::replace(['{STEAM_CLAN_IMAGE}', '[img]', '[/img]', '[h1]', '[/h1]', '[h3]', '[/h3]', '[h2]', '[/h2]', '[b]', '[/b]', '[list]', '[/list]', '[*]', '[hr]', '[/hr]', '[i>', '[/i>', '[u>', '[/u>', '<br />', '<u>', '</u>'], ['', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''], $patchnote->post_body);

@endphp

@extends('layouts.main')
@section('title', $patchnote->post_title . ' - Latestpatchnotes')
@section('description', Str::limit(strip_tags_content($description), 150, '...'))
@section('keywords', $patchnote->post_title . ',Latestpatchnotes,' . $patchnote->post_title . ' - Latestpatchnotes')
@section('og.title', $patchnote->post_title . ' - Latestpatchnotes')
@section('og.desc', Str::limit(strip_tags_content($description), 150, '...'))
@section('og.type', 'article')
@section('og_image', $patchnote->post_image)
@section('content')
    @php
    $hamham = Illuminate\Support\Str::replace('{STEAM_CLAN_IMAGE}', 'https://cdn.cloudflare.steamstatic.com/steamcommunity/public/images/clans', $patchnote->post_body);
    $hamham2 = Illuminate\Support\Str::replace('[img]', '<img src="', $hamham);
    $hamham3 = Illuminate\Support\Str::replace('[/img]', '">  ', $hamham2);
    $hamham4 = Illuminate\Support\Str::replace('[h1]', '<h1 class="text-3xl">', $hamham3);
    $hamham5 = Illuminate\Support\Str::replace('[/h1]', '</h1>', $hamham4);
    $hamham6 = Illuminate\Support\Str::replace('[h3]', '<h3 class="text-2xl">', $hamham5);
    $hamham7 = Illuminate\Support\Str::replace('[/h3]', '</h3>', $hamham6);
    $hamham8 = Illuminate\Support\Str::replace('[h2]', '<h2 class="text-xl">', $hamham7);
    $hamham9 = Illuminate\Support\Str::replace('[/h2]', '</h2>', $hamham8);
    $hamham10 = Illuminate\Support\Str::replace('[b]', '', $hamham9);
    $hamham11 = Illuminate\Support\Str::replace('[/b]', '', $hamham10);
    $hamham12 = Illuminate\Support\Str::replace('[list]', '<ul>', $hamham11);
    $hamham13 = Illuminate\Support\Str::replace('[/list]', '</ul>', $hamham12);
    $hamham14 = Illuminate\Support\Str::replace('[*]', '<li>', $hamham13);
    $hamham15 = Illuminate\Support\Str::replace('[hr]', '', $hamham14);
    $hamham16 = Illuminate\Support\Str::replace('[/hr]', '', $hamham15);
    $hamham17 = Illuminate\Support\Str::replace(['[url=', ']', '[/url>', '[i>', '[/i>', '[previewyoutube=' , '[/previewyoutube>', ';full>', '[code>', '[/code>', '[/*>', '[olist>', '[/olist>', '[u>', '[/u>'], ['<a href=', '>', '</a>', '<i>', '</i>', 'https://www.youtube.com/watch?v=' , '<br>', '', '', '', '', '<ul>', '</ul>', '<u>', '</u>'], $hamham16);

    $hamham18 = nl2br($hamham17);

    @endphp

    <div class="pnheader py-16"
        style="background-image: url('https://cdn.cloudflare.steamstatic.com/steam/apps/{{ $game->id }}/page_bg_generated_v6b.jpg?t=1660374201')">
        <div class="container flex flex-col gap-4">
            <h2 class="text-3xl pb-4"><a class="link"
                    href="{{ route('showcg', ['game' => $game->slug]) }}">{{ $game->game_name }}</a>
                <span class="text-blue-400">update for {{ $patchnote->created_at->format('d/m/Y') }}</span>
            </h2>
            <h1 class="text-3xl htext">{{ $patchnote->post_title }}</h1>
            <p class="flex"><span class="flex-grow text-gray-400">
                    <a href="{{ route('showcg', ['game' => $game->slug]) }}">View all patches</a> · <a
                        href="{{ route('showcg', ['game' => $game->slug]) }}" rel="nofollow">Gameid {{ $game->id }}</a>
                    · Last
                    edited
                    <time>{{ $patchnote->updated_at->format('d/m/Y') }}</time>
                </span></p>
        </div>
    </div>

    <div class="container mt-5">
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4215212273469017"
            crossorigin="anonymous"></script>
        <!-- Yatay -->
        <ins class="adsbygoogle" style="display:block;" data-ad-client="ca-pub-4215212273469017" data-ad-slot="1904430142"
            data-ad-format="auto" data-full-width-responsive="true"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
    </div>

    <div class="container">
        <article class="{{ $patchnote->post_title }}">
            <div class="flex flex-col htext py-8">
                <h3 class="text-start text-3xl font-bold pb-4">Patch Notes</h3>
                <div class="steamcom">
                    <svg version="1.1" width="16" height="16" viewBox="0 0 16 16"
                        class="octicon octicon-check-circle-fill" aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M8 16A8 8 0 108 0a8 8 0 000 16zm3.78-9.72a.75.75 0 00-1.06-1.06L6.75 9.19 5.28 7.72a.75.75 0 00-1.06 1.06l2 2a.75.75 0 001.06 0l4.5-4.5z">
                        </path>
                    </svg>
                    <span>Patchnotes via Steam Community</span>
                </div>
                <div class="pt-4 break-all pncontainer">
                    {!! $hamham18 !!}
                </div>
            </div>
        </article>
    </div>
@endsection
