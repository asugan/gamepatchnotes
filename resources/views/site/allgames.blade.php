@extends('layouts.main')
@section('title', 'Latest Patch Notes - All Games')
@section('description', 'We are publishing the latest games with patchnotes for you.Check out all published games.')
@section('keywords', 'Patchnotes,Latest Patchnotes,Game Patchnotes,Game News,Game Latest Patchnotes,Game Latest,' .
    'News,Patchnotes for games,latest news')
@section('og.title', 'Latest Patch Notes - All Games')
@section('og.desc', 'We are publishing the latest games with patchnotes for you.Check out all published games')
@section('og.type', 'website')
@section('og_image', 'http://latestpatchnote.com/images/lpnotes.png')
@section('content')
    <div class="container pt-8">
        <form action="{{ route('search') }}" method="get" itemprop="potentialAction" itemscope
            itemtype="http://schema.org/SearchAction">
            <div class="flex items-center justify-center">
                <div class="flex border-2 rounded">
                    <meta itemprop="target" content="https://latestpatchnotes.com/search?search={query}">
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

    <div class="container pt-8">
        <div class="breadcrumb flex justify-start items-center pb-8">
            <nav class="bctext font-bold" aria-label="Breadcrumb">
                <ol class="list-none p-0 inline-flex" itemscope itemtype="https://schema.org/BreadcrumbList">
                    <li class="flex items-center" itemprop="itemListElement" itemscope
                        itemtype="https://schema.org/ListItem">
                        <a itemprop="item" class="hover:underline" href="{{ route('welcome') }}"><span
                                itemprop="name">Home</span></a>
                        <svg class="fill-current w-3 h-3 mx-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                            <path
                                d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z" />
                        </svg>
                        <meta itemprop="position" content="1" />
                    </li>
                    <li class="flex items-center" itemprop="itemListElement" itemscope
                        itemtype="https://schema.org/ListItem">
                        <a class="hover:underline" itemprop="item" href="{{ route('allgames') }}"> <span itemprop="name">All
                                Games</span></a>
                        <meta itemprop="position" content="2" />
                    </li>
                </ol>
            </nav>
        </div>
        <h1 class="text-4xl font-bold htext tbaslik">All Games and Latest Patchnotes</h1>
        <h2 class="text-2xl py-4 htext">Curated patch notes for Steam games</h2>
        <p class="htext">We track every new build on Steam, and try connect these builds to announcements by
            the
            game developers in their hub.</p>
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

    <section class="allgames">
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
                        @foreach ($games as $gameliked)
                            <section class="{{ $gameliked->slug }}">
                                <tr class="border-b hover:bg-indigo-800">
                                    <th scope="row"
                                        class="py-0 px-0 md:py-4 md:px-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <a class="bg-indigo-800 inline-block"
                                            href="{{ route('showcg', ['game' => $gameliked->slug]) }}">
                                            <img src="{{ $gameliked->game_image }}"
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
            <div class="mt-5">
                {{ $games->links() }}
            </div>
        </div>
    </section>

@endsection
