@extends('layouts.main')
@section('content')
    @php
    $hamham = Illuminate\Support\Str::replace('{STEAM_CLAN_IMAGE}', 'https://cdn.cloudflare.steamstatic.com/steamcommunity/public/images/clans', $patchnote->post_body);
    $hamham2 = Illuminate\Support\Str::replace('[img]', '<img src="', $hamham);
    $hamham3 = Illuminate\Support\Str::replace('[/img]', '"> <br> <br>', $hamham2);
    $hamham4 = Illuminate\Support\Str::replace('[list]', '', $hamham3);
    $hamham5 = Illuminate\Support\Str::replace('[/list]', '', $hamham4);
    $hamham6 = Illuminate\Support\Str::replace('[h1]', '<h1 class="text-3xl">', $hamham5);
    $hamham7 = Illuminate\Support\Str::replace('[/h1]', '</h1><br>', $hamham6);
    $hamham8 = Illuminate\Support\Str::replace('[h3]', '<h3 class="text-2xl">', $hamham7);
    $hamham9 = Illuminate\Support\Str::replace('[/h3]', '</h3><br>', $hamham8);
    $hamham10 = Illuminate\Support\Str::replace('[url=', '<a class="underline" href=', $hamham9);
    $hamham11 = Illuminate\Support\Str::replace(']', '>', $hamham10);
    $hamham12 = Illuminate\Support\Str::replace('[/url]', '</a>', $hamham11);
    $hamham13 = Illuminate\Support\Str::replace('[/url>', '', $hamham12);
    $hamham14 = Illuminate\Support\Str::replace('[*>', '-', $hamham13);
    $hamham15 = nl2br($hamham14);
    @endphp

    <div class="container pt-8 pb-8">
        <div class="flex flex-col items-center bg-neutral-50 shadow-lg px-12 py-8">
            <h1 class="text-center text-4xl font-bold pb-4 px-24">{{ $patchnote->post_title }}</h1>
            <img class="object-fill h-64 w-96" src="{{ $patchnote->post_image }}" alt="">
            <p class="px-4 pb-8 pt-4 md:px-24">
                {!! $hamham15 !!}
            </p>
        </div>
    </div>
@endsection
