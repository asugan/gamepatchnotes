@extends('layouts.main')
@section('title', $patchnote->post_title . ' - Latestpatchnotes')
@section('description', Str::limit($patchnote->post_body, 120, '...'))
@section('keywords', $patchnote->post_title . ',Latestpatchnotes,' . $patchnote->post_title . ' - Latestpatchnotes')
@section('og.title', $patchnote->post_title . ' - Latestpatchnotes')
@section('og.desc', Str::limit($patchnote->post_body, 120, '...'))
@section('og.type', 'article')
@section('og_image', $patchnote->post_image)
@section('content')
    @php
    $hamham = Illuminate\Support\Str::replace('{STEAM_CLAN_IMAGE}', 'https://cdn.cloudflare.steamstatic.com/steamcommunity/public/images/clans', $patchnote->post_body);
    $hamham2 = Illuminate\Support\Str::replace('[img]', '<img class="mx-auto" src="', $hamham);
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
    $hamham17 = Illuminate\Support\Str::replace(['[url=', ']', '[/url>', '[i>', '[/i>', '[previewyoutube=' , '[/previewyoutube>', ';full>', '[code>', '[/code>', '[/*>'], ['<a href=', '>', '</a>', '<i>', '</i>', 'https://www.youtube.com/watch?v=' , '<br>', '', '', '', ''], $hamham16);

    $hamham18 = nl2br($hamham17);

    @endphp

    <div class="container">
        <article class="{{ $patchnote->post_title }}">
            <div class="flex flex-col htext py-8">
                <h1 class="text-start text-4xl font-bold pb-4">{{ $patchnote->post_title }}</h1>
                <img class="object-fill h-64 w-96" src="{{ $patchnote->post_image }}" alt="{{ $patchnote->post_title }}">
                <div class="steamcom mt-4">
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
