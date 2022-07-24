@extends('layouts.main')
@section('title', $game->game_name . ' | GamePatchNotes')
@section('description', Str::limit('Follow the latest patchnotes of ' . $game->game_name . ' in GamePatchNotes.com!',
    120, '...'))
@section('keywords', $game->game_name . ',Gamepatchnotes,' . $game->game_name . ' | GamePatchNotes,' . $game->game_name
    . ' Patchnotes')
@section('content')
    <div class="container pt-8 pb-8">
        <div class="grid md:grid-cols-4 grid-cols-1 gap-4">
            <div class="game md:col-start-4 md:col-end-5">
                <div class="flex flex-col items-center bg-neutral-50 shadow-lg">
                    <a href="{{ route('showcg', ['game' => $game->slug]) }}">
                        <h1 class="text-center text-4xl font-bold pb-4 pt-4 duration-150 hover:text-indigo-500">
                            {{ $game->game_name }}</h1>
                    </a>
                    <a class="bg-indigo-800 inline-block" href="{{ route('showcg', ['game' => $game->slug]) }}">
                        <img class="object-fill h-64 w-64 hover:opacity-50 duration-300" src="{{ $game->game_image }}"
                            alt="">
                    </a>
                    <ul class="pt-4 gap-4 text-center text-xl underline">
                        <li>Game Platform : {{ $game->game_platform }}</li>
                        <li>Release Date : {{ $game->release_date }}</li>
                        <li>Genre : {{ $game->genre }}</li>
                        <li>Developer : {{ $game->developer }}</li>
                    </ul>
                    <div class="likebutton py-4 flex justify-center content-center">
                        <td class="px-6 py-4 text-sm text-gray-500 border-b border-gray-200">
                            @if ($game->liked())
                                <form action="{{ route('unlike.post', $game->id) }}" method="post">
                                    @csrf
                                    <button
                                        class="{{ $game->liked() ? 'block' : 'hidden' }} inline-flex items-center h-12 px-8 m-2 text-sm text-indigo-100 transition-colors duration-150 bg-red-600 rounded-lg focus:shadow-outline hover:bg-indigo-800">
                                        Remove From Favourite
                                    </button>
                                </form>
                            @else
                                <form action="{{ route('like.post', $game->id) }}" method="post">
                                    @csrf
                                    <button
                                        class="{{ $game->liked() ? 'bg-blue-600' : '' }} inline-flex items-center h-12 px-8 m-2 text-sm text-indigo-100 transition-colors duration-150 bg-gray-600 rounded-lg focus:shadow-outline hover:bg-indigo-800">
                                        Add to Favourite
                                    </button>
                                </form>
                            @endif
                        </td>
                    </div>
                </div>
            </div>
            <div class="patchnote md:col-start-1 md:col-end-4 md:row-start-1">
                @forelse ($patchnotes as $patchnote)
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
                        $hamham17 = Illuminate\Support\Str::replace(['[url=', ']', '[/url>', '[i>', '[/i>', '[previewyoutube=' , '[/previewyoutube>', ';full>', '[code>', '[/code>'], ['<a href=', '>', '</a>', '<i>', '</i>', 'https://www.youtube.com/watch?v=' , '<br>', '', '', ''], $hamham16);
                        
                        $hamham18 = nl2br($hamham17);
                    @endphp
                    <div class="flex flex-col items-center bg-neutral-50 shadow-lg mb-4 py-8 gap-2">
                        <a href="{{ route('show', ['patchnote' => $patchnote->slug]) }}">
                            <h1
                                class="text-center text-4xl font-bold pb-4 px-0 lg:px-24 duration-150 hover:text-indigo-500">
                                {{ $patchnote->post_title }}
                            </h1>
                        </a>
                        <a class="bg-indigo-800 inline-block"
                            href="{{ route('show', ['patchnote' => $patchnote->slug]) }}">
                            <img class="object-fill h-64 w-96 hover:opacity-50 duration-300"
                                src="{{ $patchnote->post_image }}" alt="">
                        </a>
                        <div class="px-4 pb-8 pt-4 break-all pncontainer md:px-24">
                            {!! Illuminate\Support\Str::limit($hamham18, 500, $end = '...') !!}
                        </div>
                        <div class="button">
                            <a class="inline-flex items-center h-12 px-8 mb-6 m-2 text-sm text-indigo-100 transition-colors duration-150 bg-gray-600 rounded-lg focus:shadow-outline hover:bg-indigo-800"
                                href="{{ route('show', ['patchnote' => $patchnote->slug]) }}">Read the Patchnote</a>
                        </div>
                    </div>
                    <div class="mt-5">
                        {{ $patchnotes->links() }}
                    </div>
                @empty
                    <div class="flex justify-center pt-0 md:pt-16">
                        <h1 class="text-3xl font-bold">No Patchnotes Yet...</h1>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
