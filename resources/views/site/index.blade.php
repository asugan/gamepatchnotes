@extends('layouts.main')
@section('content')
    <div class="searchbar pt-4 pb-4">
        <form action="{{ route('search') }}" method="get">
            {{ csrf_field() }}
            <div class="flex items-center justify-center">
                <div class="flex border-2 rounded">
                    <input name="search" type="text" class="px-4 py-2 w-80" placeholder="Search a Game!">
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


    <section class="game-slider px-24">
        <div class="owl-carousel owl1">
            @foreach ($games as $game)
                <div class="item">
                    <a href="{{ route('showcg', ['game' => $game->slug]) }}">
                        <img src="{{ $game->game_image }}" alt="" class="h-96" />
                    </a>
                </div>
            @endforeach
        </div>
    </section>

    <section class="patchnotes">
        <div class="container pt-4 pb-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="patchnotes">
                    <h1 class="text-center text-4xl font-bold">Latest Patchnotes</h1>
                    <div class="patchnotecount md:px-16 px-0">
                        <h1 class="text-2xl font-bold text-center pt-2">Patchnotes In DB : {{ $patchnotescount }}</h1>
                    </div>
                    <div class="flex justify-center pt-2">
                        <a class="inline-flex items-center h-12 px-8 m-2 text-sm text-indigo-100 transition-colors duration-150 bg-gray-600 rounded-lg focus:shadow-outline hover:bg-indigo-800"
                            href="{{ route('lpatchnotes') }}">View all</a>
                    </div>
                    <div class="flex flex-col gap-4 mt-4">
                        @foreach ($hamham as $item)
                            <div
                                class="patchnote bg-neutral-50 shadow-lg grid grid-cols-1 md:grid-cols-4 md:gap-4 text-center md:text-left py-2 items-center">
                                <div class="grid2 md:col-start-1 md:col-end-2 justify-self-center px-2 py-2">
                                    <a href="{{ route('show', ['patchnote' => $item->slug]) }}">
                                        <img src="{{ $item->post_image }}" alt="" class="w-32 h-16 ml-2 md:ml-0">
                                    </a>
                                </div>
                                <div class="grid3 md:col-start-2 md:col-end-5 md:pr-8 pr-0">
                                    <a href="{{ route('show', ['patchnote' => $item->slug]) }}">
                                        <h1 class="text-xl py-4">{{ $item->post_title }}</h1>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="latestgames">
                    <h1 class="text-center text-4xl font-bold">Latest Games</h1>
                    <div class="gamecount md:px-16 px-0">
                        <h1 class="text-2xl font-bold text-center pt-2">Games In DB : {{ $gamecount }}</h1>
                    </div>
                    <div class="flex justify-center pt-2">
                        <a class="inline-flex items-center h-12 px-8 m-2 text-sm text-indigo-100 transition-colors duration-150 bg-gray-600 rounded-lg focus:shadow-outline hover:bg-indigo-800"
                            href="{{ route('allgames') }}">View all</a>
                    </div>
                    @foreach ($latest as $gameliked)
                        <div class="bg-neutral-50 rounded overflow-hidden shadow-lg mt-4 mb-4">
                            <div class="grid grid-cols-1 lg:grid-cols-2">
                                <div class="firstgrid image p-4 self-center">
                                    <a href="{{ route('showcg', ['game' => $gameliked->slug]) }}">
                                        <img src="{{ $gameliked->game_image }}" class="h-64 w-full" alt="">
                                    </a>
                                </div>
                                <div class="secondgrid pr-2 pl-2 lg:pl-0 flex flex-col justify-between">
                                    <div class="text">
                                        <a href="{{ route('showcg', ['game' => $gameliked->slug]) }}">
                                            <h1 class="text-3xl text-center pt-4 pb-4
                                    ">
                                                {{ $gameliked->game_name }}
                                            </h1>
                                        </a>
                                    </div>
                                    @if (!$gameliked->patchnotes->isEmpty())
                                        <div class="grid grid-cols-3 gap-3 bg-slate-200 shadow-lg px-1 py-1">
                                            <div class="patchnote flex flex-col gap-1 col-start-1 col-end-4">
                                                <a
                                                    href="{{ route('show', ['patchnote' => $gameliked->patchnotes->first()->slug]) }}">
                                                    <h1 class="text-lg">{{ $gameliked->patchnotes->first()->post_title }}
                                                    </h1>
                                                </a>
                                                <a href="{{ route('show', ['patchnote' => $gameliked->patchnotes->first()->slug]) }}"
                                                    class="underline">Read the patchnote</a>
                                            </div>
                                        </div>
                                    @else
                                        <h1 class="text-center text-2xl font-bold">No Patchnotes Yet...</h1>
                                    @endif
                                    <div class="likebutton py-4 flex justify-center content-center">
                                        <td class="px-6 py-4 text-sm text-gray-500 border-b border-gray-200">
                                            @if ($gameliked->liked())
                                                <form action="{{ route('unlike.post', $gameliked->id) }}" method="post">
                                                    @csrf
                                                    <button
                                                        class="{{ $gameliked->liked() ? 'block' : 'hidden' }} px-4 py-2 text-white bg-red-600">
                                                        Remove From Favourite
                                                    </button>
                                                </form>
                                            @else
                                                <form action="{{ route('like.post', $gameliked->id) }}" method="post">
                                                    @csrf
                                                    <button
                                                        class="{{ $gameliked->liked() ? 'bg-blue-600' : '' }} px-4 py-2 text-white bg-gray-600">
                                                        Add to Favourite
                                                    </button>
                                                </form>
                                            @endif
                                        </td>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
