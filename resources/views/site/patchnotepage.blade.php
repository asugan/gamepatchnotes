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
@section('title', $patchnote->post_title . ' - ' . $game->game_name . ' patch notes for ' .
    $patchnote->created_at->format('j F Y') . ' - Latest Patch Notes')
@section('description', Str::limit(strip_tags_content($description), 150, '...'))
@section('keywords', $patchnote->post_title . ',Latestpatchnotes,' . $patchnote->post_title . ' - Latestpatchnotes,' .
    $game->game_name . ' ' . $patchnote->post_title . ' patchnotes')
@section('og.title', $patchnote->post_title . ' - ' . $game->game_name . ' patch notes for ' .
    $patchnote->created_at->format('j F Y') . ' - Latest Patch Notes')
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
        $hamham17 = Illuminate\Support\Str::replace(['[url=', ']', '[/url>', '[i>', '[/i>', '[previewyoutube=', '[/previewyoutube>', ';full>', '[code>', '[/code>', '[/*>', '[olist>', '[/olist>', '[u>', '[/u>', '[table>', '[/table>', '[tr>', '[/tr>', '[td>', '[/td>', '[th>', '[/th>', '[h4>', '[/h4>'], ['<a href=', '>', '</a>', '<i>', '</i>', 'https://www.youtube.com/watch?v=', '<br>', '', '', '', '', '<ul>', '</ul>', '<u>', '</u>', '<table>', '</table>', '<tr>', '</tr>', '<td>', '</td>', '<th>', '</th>', '<h4>', '</h4>'], $hamham16);
        
        $hamham18 = nl2br($hamham17);
        
    @endphp

    <div class="pnheader py-8"
        style="background-image: url('https://cdn.cloudflare.steamstatic.com/steam/apps/{{ $game->id }}/page_bg_generated_v6b.jpg?t=1660374201')">
        <div class="container">
            <div class="breadcrumb flex justify-start items-center pb-8">
                <nav class="bctext font-bold" aria-label="Breadcrumb">
                    <ol class="list-none p-0 inline-flex">
                        <li class="flex items-center">
                            <a class="hover:underline" href="{{ route('welcome') }}">Home</a>
                            <svg class="fill-current w-3 h-3 mx-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                                <path
                                    d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z" />
                            </svg>
                        </li>
                        <li class="flex items-center">
                            <a class="hover:underline"
                                href="{{ route('showcg', ['game' => $game->slug]) }}">{{ $game->game_name }}</a>
                            <svg class="fill-current w-3 h-3 mx-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                                <path
                                    d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z" />
                            </svg>
                        </li>
                        <li>
                            <a href="{{ route('show', ['patchnote' => $patchnote->slug]) }}" class="text-gray-400"
                                aria-current="page">{{ $patchnote->post_title }}</a>
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="flex flex-col gap-4">
                <h1 class="text-xl pb-4"><a class="link"
                        href="{{ route('showcg', ['game' => $game->slug]) }}">{{ $game->game_name }}</a>
                    <span class="text-blue-400">patch notes for {{ $patchnote->created_at->format('j F Y') }}</span>
                </h1>
                <h2 class="text-2xl htext">{{ $patchnote->post_title }}</h2>
                <p class="flex"><span class="flex-grow text-gray-400">
                        <a href="{{ route('showcg', ['game' => $game->slug]) }}">View all patches</a> · <a
                            href="{{ route('showcg', ['game' => $game->slug]) }}" rel="nofollow">Gameid
                            {{ $game->id }}</a>
                        · Last
                        edited
                        <time>{{ $patchnote->updated_at->format('d/m/Y') }}</time>
                    </span></p>
            </div>

        </div>
    </div>

    <div class="container mt-5">
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4215212273469017"
            crossorigin="anonymous"></script>
        <!-- Yatay -->
        <ins class="adsbygoogle text-center" style="display:block;" data-ad-client="ca-pub-4215212273469017"
            data-ad-slot="1904430142" data-ad-format="auto" data-full-width-responsive="true"></ins>
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
