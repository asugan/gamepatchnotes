@extends('layouts.main')
@section('title', $game->game_name . ' - Latest Patch Notes')
@section('description', Str::limit('Follow the latest patchnotes of ' . $game->game_name . ' in Latestpatchnotes.com!',
    120, '...'))
@section('keywords', $game->game_name . ',Latestpatchnotes,' . $game->game_name . ' - Latestpatchnotes,' .
    $game->game_name . ' Patchnotes')
@section('og.title', $game->game_name . ' - Latest Patch Notes')
@section('og.desc', Str::limit('Follow the latest patchnotes of ' . $game->game_name . ' in Latestpatchnotes.com!', 120,
    '...'))
@section('og.type', 'article')
@section('og_image', $game->game_image)
@section('content')

    <section class="game">
        <div class="container py-8">
            <div class="grid grid-cols-1 md:grid-cols-3">
                <div class="md:col-start-1 md:col-end-4">
                    <h1 class="text-3xl text-white pb-8 tbaslik">{{ $game->game_name }}</h1>
                </div>
                <div class="md:col-start-1 md:col-end-3 md:pr-12 pr-0">
                    <div class="overflow-x-auto relative">
                        <table class="w-full text-left border">
                            <tbody class="tablebody">
                                <tr class="border-b hover:bg-indigo-800">
                                    <td class="py-4 border-r px-4 md:whitespace-normal whitespace-nowrap">
                                        App ID
                                    </td>
                                    <td class="py-4 px-4 md:whitespace-normal whitespace-nowrap">
                                        {{ $game->id }}
                                    </td>
                                </tr>
                                <tr class="border-b hover:bg-indigo-800">
                                    <td class="py-4 border-r px-4 md:whitespace-normal whitespace-nowrap">
                                        Release Date
                                    </td>
                                    <td class="py-4 px-4 md:whitespace-normal whitespace-nowrap">
                                        {{ $game->release_date }}
                                    </td>
                                </tr>
                                <tr class="border-b hover:bg-indigo-800">
                                    <td class="py-4 border-r px-4 md:whitespace-normal whitespace-nowrap">
                                        Genre
                                    </td>
                                    <td class="py-4 px-4 md:whitespace-normal whitespace-nowrap">
                                        {{ $game->genre }}
                                    </td>
                                </tr>
                                <tr class="border-b hover:bg-indigo-800">
                                    <td class="py-4 border-r px-4 md:whitespace-normal whitespace-nowrap">
                                        Developer
                                    </td>
                                    <td class="py-4 px-4 md:whitespace-normal whitespace-nowrap">
                                        {{ $game->developer }}
                                    </td>
                                </tr>
                                <tr class="border-b hover:bg-indigo-800">
                                    <td class="py-4 border-r px-4 md:whitespace-normal whitespace-nowrap">
                                        Platform
                                    </td>
                                    <td class="py-4 px-4 md:whitespace-normal whitespace-nowrap">
                                        {{ $game->game_platform }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="md:col-start-3 md:col-end-4 pt-8 md:pt-0">
                    <div class="image flex justify-center">
                        <img class="" src="{{ $game->game_image }}" alt="">
                    </div>
                    <div class="likebutton pt-4 flex justify-center content-center">
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
        </div>
    </section>

    <div class="container">
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4215212273469017"
            crossorigin="anonymous"></script>
        <!-- Yatay -->
        <ins class="adsbygoogle text-center" style="display:block;" data-ad-client="ca-pub-4215212273469017"
            data-ad-slot="1904430142" data-ad-format="auto" data-full-width-responsive="true"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
    </div>

    <section class="gamepatchnotes">
        <div class="container mx-auto pt-4 pb-4">
            <div class="overflow-x-auto relative">
                <table class="w-full text-left">
                    <thead class="tablehead">
                        <tr>
                            <th scope="col" class="py-3 px-6">Image</th>
                            <th scope="col" class="py-3 px-6">Date</th>
                            <th scope="col" class="py-3 px-6">Patch Title</th>
                            <th scope="col" class="py-3 px-6">Game ID</th>
                        </tr>
                    </thead>
                    <tbody class="tablebody">
                        @foreach ($patchnotes as $item)
                            <section class="{{ $item->slug }}">
                                <tr class="border-b hover:bg-indigo-800">
                                    <th scope="row"
                                        class="py-0 px-0 md:py-4 md:px-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <a class="bg-indigo-800 inline-block"
                                            href="{{ route('show', ['patchnote' => $item->slug]) }}">
                                            <img src="{{ $item->post_image }}" alt="{{ $item->post_title }}"
                                                class="patchnote_image hover:opacity-50 duration-300">
                                        </a>
                                    </th>
                                    <td class="py-4 px-4 md:whitespace-normal whitespace-nowrap">
                                        <a class="hover:underline"
                                            href="{{ route('show', ['patchnote' => $item->slug]) }}">{{ $item->created_at->format('d/m/Y') }}</a>
                                    </td>
                                    <td class="py-4 px-4 md:whitespace-normal whitespace-nowrap">
                                        <a class="hover:underline"
                                            href="{{ route('show', ['patchnote' => $item->slug]) }}">{{ $item->post_title }}
                                        </a>
                                    </td>
                                    <td class="py-4 px-6 whitespace-nowrap">
                                        <a class="hover:underline"
                                            href="{{ route('showcg', ['game' => $game->slug]) }}">{{ $item->games_id }}</a>
                                    </td>
                                </tr>
                            </section>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-5">
                {{ $patchnotes->links() }}
            </div>
        </div>
    </section>
@endsection
