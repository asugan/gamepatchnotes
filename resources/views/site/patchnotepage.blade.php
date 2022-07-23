@extends('layouts.main')
@section('content')
    @php
    $hamham = Illuminate\Support\Str::replace('{STEAM_CLAN_IMAGE}', 'https://cdn.cloudflare.steamstatic.com/steamcommunity/public/images/clans', $patchnote->post_body);
    $hamham2 = Illuminate\Support\Str::replace('[img]', '<img class="mx-auto" src="', $hamham);
    $hamham3 = Illuminate\Support\Str::replace('[/img]', '"> <br> <br>', $hamham2);
    $hamham4 = Illuminate\Support\Str::replace('[h1]', '<h1 class="text-3xl">', $hamham3);
    $hamham5 = Illuminate\Support\Str::replace('[/h1]', '</h1><br>', $hamham4);
    $hamham6 = Illuminate\Support\Str::replace('[h3]', '<h3 class="text-2xl">', $hamham5);
    $hamham7 = Illuminate\Support\Str::replace('[/h3]', '</h3><br>', $hamham6);
    $hamham8 = Illuminate\Support\Str::replace('[h2]', '<h2 class="text-xl">', $hamham7);
    $hamham9 = Illuminate\Support\Str::replace('[/h2]', '</h2><br>', $hamham8);
    $hamham10 = Illuminate\Support\Str::replace('[b]', '', $hamham9);
    $hamham11 = Illuminate\Support\Str::replace('[/b]', '', $hamham10);
    $hamham12 = Illuminate\Support\Str::replace('[list]', '<list>', $hamham11);
    $hamham13 = Illuminate\Support\Str::replace('[/list]', '</list>', $hamham12);
    $hamham14 = Illuminate\Support\Str::replace('[*]', '<li>', $hamham13);
    $hamham15 = Illuminate\Support\Str::replace('[hr]', '', $hamham14);
    $hamham16 = Illuminate\Support\Str::replace('[/hr]', '', $hamham15);

    $hamham17 = nl2br($hamham16);
    @endphp

    <div class="container pt-8 pb-8">
        <div class="flex flex-col items-center bg-neutral-50 shadow-lg px-12 py-8">
            <h1 class="text-center text-4xl font-bold pb-4 px-0 lg:px-24">{{ $patchnote->post_title }}</h1>
            <img class="object-fill h-64 w-96" src="{{ $patchnote->post_image }}" alt="">
            <div class="px-4 pb-8 pt-4 md:px-24 break-all">
                {!! $hamham17 !!}
            </div>
        </div>
    </div>
@endsection
