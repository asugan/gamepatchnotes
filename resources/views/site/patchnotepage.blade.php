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

    <div class="container pt-8 pb-8">
        <article class="{{ $patchnote->post_title }}">
            <div class="flex flex-col items-center bg-neutral-50 shadow-lg px-12 py-8">
                <h1 class="text-center text-4xl font-bold pb-4 px-0 lg:px-24">{{ $patchnote->post_title }}</h1>
                <img class="object-fill h-64 w-96" src="{{ $patchnote->post_image }}" alt="{{ $patchtnote->post_title }}">
                <div class="px-4 pb-8 pt-4 md:px-24 break-all pncontainer">
                    {!! $hamham18 !!}
                </div>
            </div>
        </article>
    </div>
@endsection
