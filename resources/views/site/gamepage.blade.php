@extends('layouts.main')
@section('title', $game->game_name . ' - Latest Patch Notes')
@section('description', $game->description)
@section('keywords', $game->game_name . ',Latestpatchnotes,' . $game->game_name . ' - Latestpatchnotes,' .
    $game->game_name . ' Patchnotes')
@section('og.title', $game->game_name . ' - Latest Patch Notes')
@section('og.desc', $game->description)
@section('og.type', 'article')
@section('og_image', $game->game_image)
@section('content')

    <section class="game" itemscope itemtype="http://schema.org/VideoGame">
        <meta itemprop="operatingSystem" content="Windows, macOS, Linux">
        <div class="container py-8">
            <div class="grid grid-cols-1 md:grid-cols-3">
                <div class="md:col-start-1 md:col-end-4">
                    <div class="breadcrumb flex justify-start items-center pb-8">
                        <nav class="bctext font-bold" aria-label="Breadcrumb">
                            <ol class="list-none p-0 inline-flex" itemscope itemtype="https://schema.org/BreadcrumbList">
                                <li class="flex items-center" itemprop="itemListElement" itemscope
                                    itemtype="https://schema.org/ListItem">
                                    <a itemprop="item" class="hover:underline" href="{{ route('welcome') }}"><span
                                            itemprop="name">Home</span></a>
                                    <svg class="fill-current w-3 h-3 mx-3" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 320 512">
                                        <path
                                            d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z" />
                                    </svg>
                                    <meta itemprop="position" content="1" />
                                </li>
                                <li class="flex items-center" itemprop="itemListElement" itemscope
                                    itemtype="https://schema.org/ListItem">
                                    <a class="hover:underline" itemprop="item" href="{{ route('allgames') }}"> <span
                                            itemprop="name">All Games</span></a>
                                    <svg class="fill-current w-3 h-3 mx-3" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 320 512">
                                        <path
                                            d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z" />
                                    </svg>
                                    <meta itemprop="position" content="2" />
                                </li>
                                <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                    <a itemprop="item" href="{{ route('showcg', ['game' => $game->slug]) }}"
                                        class="text-gray-400" aria-current="page"> <span
                                            itemprop="name">{{ $game->game_name }}</span></a>
                                    <meta itemprop="position" content="3" />
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <h1 class="text-3xl text-white pb-8 tbaslik" itemprop="name">{{ $game->game_name }}</h1>
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
                                    <td class="py-4 px-4 md:whitespace-normal whitespace-nowrap" itemprop="datePublished">
                                        {{ $game->release_date }}
                                    </td>
                                </tr>
                                <tr class="border-b hover:bg-indigo-800">
                                    <td class="py-4 border-r px-4 md:whitespace-normal whitespace-nowrap">
                                        Genre
                                    </td>
                                    <td class="py-4 px-4 md:whitespace-normal whitespace-nowrap" itemprop="genre">
                                        {{ $game->genre }}
                                    </td>
                                </tr>
                                <tr class="border-b hover:bg-indigo-800">
                                    <td class="py-4 border-r px-4 md:whitespace-normal whitespace-nowrap">
                                        Developer
                                    </td>
                                    <td class="py-4 px-4 md:whitespace-normal whitespace-nowrap" itemprop="author">
                                        <a class="hover:underline"
                                            href="https://www.google.com/search?q={{ $game->developer }}"
                                            itemprop="author">{{ $game->developer }}</a>
                                    </td>
                                </tr>
                                <tr class="border-b hover:bg-indigo-800">
                                    <td class="py-4 border-r px-4 md:whitespace-normal whitespace-nowrap">
                                        Platform
                                    </td>
                                    <td class="py-4 px-4 md:whitespace-normal whitespace-nowrap" itemprop="gamePlatform">
                                        {{ $game->game_platform }}
                                    </td>
                                </tr>
                                <tr class="border-b hover:bg-indigo-800">
                                    <td class="py-4 border-r px-4 md:whitespace-normal whitespace-nowrap">
                                        Type
                                    </td>
                                    <td class="py-4 px-4 md:whitespace-normal whitespace-nowrap" itemprop="gamePlatform">
                                        {{ $game->type }}
                                    </td>
                                </tr>
                                <tr class="border-b hover:bg-indigo-800">
                                    <td class="py-4 border-r px-4 md:whitespace-normal whitespace-nowrap">
                                        Website
                                    </td>
                                    <td class="py-4 px-4 md:whitespace-normal whitespace-nowrap" itemprop="gamePlatform">
                                        <a class="hover:underline" href="{{ $game->website }}">Go to Website</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="md:col-start-3 md:col-end-4 pt-8 md:pt-0">
                    <div class="image flex justify-center flex-col">
                        <img class="" itemprop="image" src="{{ $game->game_image }}" alt="">
                        <p class="htext pt-4">{{ $game->description }}</p>
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
