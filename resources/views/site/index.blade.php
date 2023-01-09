@extends('layouts.main')
@section('title', 'Latest Patch Notes - Get Latest Patchnotes and News for Games')
@section('description', 'We publish the latest news and patchnotes about the games for you.Follow your game and get ' .
    'notification when game updated!')
@section('og.title', 'Latest Patch Notes - Get Latest Patchnotes and News for Games')
@section('og.desc', 'We publish the latest news and patchnotes about the games for you.Follow your game and get ' .
    'notification when game updated!')
@section('og.type', 'website')
@section('og_image', 'http://latestpatchnote.com/images/lpnotes.png')

@section('content')

    <div class="searchbar pt-8 pb-4">
        <form action="{{ route('search') }}" method="get" itemprop="potentialAction" itemscope
            itemtype="http://schema.org/SearchAction">
            <div class="flex items-center justify-center">
                <div class="flex border-2 rounded">
                    <meta itemprop="target" content="https://latestpatchnotes.com/search?search={search}">
                    <input name="search" id="search" type="text" class="px-4 py-2 w-80" placeholder="Search a Game!"
                        itemprop="query-input">
                    <button class="flex items-center justify-center px-4 border-l">
                        <svg class="w-6 h-6 text-gray-600" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24">
                            <path
                                d="M16.32 14.9l5.39 5.4a1 1 0 0 1-1.42 1.4l-5.38-5.38a8 8 0 1 1 1.41-1.41zM10 16a6 6 0 1 0 0-12 6 6 0 0 0 0 12z" />
                        </svg>
                    </button>
                </div>
            </div>
        </form>
    </div>

    <section class="tanitim">
        <div class="container py-5">
            <h1 class="tbaslik text-4xl font-bold">Patch notes database of every games.
            </h1>
            <p class="htext py-5 pr-0 md:pr-48">This third-party website gives you better insight into the latest patch
                notes of
                games in every platforms.<br><br>

                Look through our FAQ if you have any questions, join our Discord. Follow @latestpnotes on
                Twitter.
            </p>
        </div>
    </section>

    <div class="container mb-5">
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4215212273469017"
            crossorigin="anonymous"></script>
        <!-- Yatay -->
        <ins class="adsbygoogle text-center" style="display:block;" data-ad-client="ca-pub-4215212273469017"
            data-ad-slot="1904430142" data-ad-format="auto" data-full-width-responsive="true"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
    </div>

    <section class="gamesection">
        <h1 class="text-center text-4xl font-bold htext">Latest Games</h1>
        <div class="gamecount md:px-16 px-0">
            <h1 class="text-2xl font-bold text-center pt-2 htext">Games in DB : {{ $gamecount }}</h1>
        </div>
        <div class="flex justify-center pt-2">
            <a class="butonbg inline-flex items-center h-12 px-8 m-2 text-sm text-indigo-100 transition-colors duration-150 bg-gray-600 rounded-lg focus:shadow-outline hover:bg-indigo-800 htext"
                href="{{ route('allgames') }}">View all</a>
        </div>

        <div class="container mx-auto pt-4 pb-4">
            <div class="overflow-x-auto relative">
                <table class="w-full text-left">
                    <thead class="tablehead">
                        <tr>
                            <th scope="col" class="py-3 px-6">Image</th>
                            <th scope="col" class="py-3 px-6">Game</th>
                            <th scope="col" class="py-3 px-6">Latest Patchnote</th>
                            <th scope="col" class="text-center py-3 px-6">Add Favourite</th>
                        </tr>
                    </thead>
                    <tbody class="tablebody">
                        @foreach ($latest as $gameliked)
                            <section class="{{ $gameliked->slug }}">
                                <tr class="border-b hover:bg-indigo-800">
                                    <th scope="row"
                                        class="py-0 px-0 md:py-4 md:px-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <a class="bg-indigo-800 inline-block"
                                            href="{{ route('showcg', ['game' => $gameliked->slug]) }}">
                                            <img src="{{ $gameliked->short_image }}"
                                                class="game_image hover:opacity-50 duration-300"
                                                alt="{{ $gameliked->game_name }}">
                                        </a>
                                    </th>
                                    <td class="py-4 px-4 md:whitespace-normal whitespace-nowrap">
                                        <a class="hover:underline"
                                            href="{{ route('showcg', ['game' => $gameliked->slug]) }}">{{ $gameliked->game_name }}</a>
                                    </td>
                                    <td class="py-4 px-4 md:whitespace-normal whitespace-nowrap">
                                        @if (!$gameliked->patchnotes->isEmpty())
                                            <a class="hover:underline"
                                                href="{{ route('show', ['patchnote' => $gameliked->patchnotes->first()->slug]) }}">{{ $gameliked->patchnotes->first()->post_title }}
                                            </a>
                                        @else
                                            <p class="font-bold">No Patchnotes Yet...</p>
                                        @endif
                                    </td>
                                    <td class="text-center py-4 px-6">
                                        @if ($gameliked->liked())
                                            <form action="{{ route('unlike.post', $gameliked->id) }}" method="post">
                                                @csrf
                                                <button class="text-3xl">-</button>
                                            </form>
                                        @else
                                            <form action="{{ route('like.post', $gameliked->id) }}" method="post">
                                                @csrf
                                                <button class="text-3xl">+</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            </section>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>

@endsection
