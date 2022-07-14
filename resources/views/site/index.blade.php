@extends('layouts.main')
@section('content')
    <div class="container pt-4 pb-4">
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
                        <img src="{{ @App::make('url')->to('/') . '/storage' . $game->game_image }}" alt=""
                            class="h-96" />
                    </a>
                </div>
            @endforeach
        </div>
    </section>

    <section class="patchnotes">
        <div class="container pt-4 pb-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="likedgames">
                    <h1 class="text-center text-4xl font-bold">Followed Games</h1>
                    @auth
                        <div class="flex justify-center pt-2">
                            <a class="inline-flex items-center h-12 px-8 m-2 text-sm text-indigo-100 transition-colors duration-150 bg-gray-600 rounded-lg focus:shadow-outline hover:bg-indigo-800"
                                href="{{ route('followedgames') }}">View all</a>
                        </div>
                        @foreach ($likedgames as $gameliked)
                            <div class="bg-neutral-50 rounded overflow-hidden shadow-lg mt-4 mb-4">
                                <div class="grid grid-cols-1 lg:grid-cols-2">
                                    <div class="firstgrid image p-4 self-center">
                                        <a href="{{ route('showcg', ['game' => $game->slug]) }}">
                                            <img src="{{ @App::make('url')->to('/') . '/storage' . $gameliked->game_image }}"
                                                class="h-64 w-full" alt="">
                                        </a>
                                    </div>
                                    <div class="secondgrid pr-2 pl-2 lg:pl-0 flex flex-col justify-between">
                                        <div class="text">
                                            <a href="{{ route('showcg', ['game' => $game->slug]) }}">
                                                <h1 class="text-3xl text-center pt-4 pb-4">
                                                    {{ $gameliked->game_name }}
                                                </h1>
                                            </a>
                                        </div>
                                        @if (!$gameliked->patchnotes->isEmpty())
                                            <div class="grid grid-cols-3 gap-3 bg-slate-200 shadow-lg px-1 py-1">
                                                <div class="imagediv self-center">
                                                    <a
                                                        href="{{ route('show', ['patchnote' => $gameliked->patchnotes->first()->slug]) }}">
                                                        <img src="{{ @App::make('url')->to('/') . '/storage' . $gameliked->patchnotes->first()->post_image }}"
                                                            class="object fill h-24 w-24" alt="">
                                                    </a>
                                                </div>
                                                <div class="patchnote flex flex-col gap-1 col-start-2 col-end-4">
                                                    <a
                                                        href="{{ route('show', ['patchnote' => $gameliked->patchnotes->first()->slug]) }}">
                                                        <h1 class="text-lg">
                                                            {{ $gameliked->patchnotes->first()->post_title }}
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
                    @endauth
                    @guest
                        <div class="guest pt-16">
                            <h1 class="text-center text-4xl font-bold">Please Login for Follow a Game !</h1>
                            <div class="flex justify-center pt-8">
                                <a class="inline-flex items-center h-12 px-8 m-2 text-sm text-indigo-100 transition-colors duration-150 bg-gray-600 rounded-lg focus:shadow-outline hover:bg-indigo-800"
                                    href="/register">Register</a>
                                <a class="inline-flex items-center h-12 px-8 m-2 text-sm text-indigo-100 transition-colors duration-150 bg-gray-600 rounded-lg focus:shadow-outline hover:bg-indigo-800"
                                    href="/login">Login</a>
                                <a class="inline-flex items-center h-12 px-8 m-2 text-sm text-indigo-100 transition-colors duration-150 bg-gray-600 rounded-lg focus:shadow-outline hover:bg-indigo-800"
                                    href="/auth/steam">Steam Login</a>
                            </div>
                        </div>
                    @endguest
                </div>
                <div class="latestgames">
                    <h1 class="text-center text-4xl font-bold">Latest Games</h1>
                    <div class="flex justify-center pt-2">
                        <a class="inline-flex items-center h-12 px-8 m-2 text-sm text-indigo-100 transition-colors duration-150 bg-gray-600 rounded-lg focus:shadow-outline hover:bg-indigo-800"
                            href="{{ route('allgames') }}">View all</a>
                    </div>
                    @foreach ($latest as $gameliked)
                        <div class="bg-neutral-50 rounded overflow-hidden shadow-lg mt-4 mb-4">
                            <div class="grid grid-cols-1 lg:grid-cols-2">
                                <div class="firstgrid image p-4 self-center">
                                    <a href="{{ route('showcg', ['game' => $game->slug]) }}">
                                        <img src="{{ @App::make('url')->to('/') . '/storage' . $gameliked->game_image }}"
                                            class="h-64 w-full" alt="">
                                    </a>
                                </div>
                                <div class="secondgrid pr-2 pl-2 lg:pl-0 flex flex-col justify-between">
                                    <div class="text">
                                        <a href="{{ route('showcg', ['game' => $game->slug]) }}">
                                            <h1 class="text-3xl text-center pt-4 pb-4
                                    ">
                                                {{ $gameliked->game_name }}
                                            </h1>
                                        </a>
                                    </div>
                                    @if (!$gameliked->patchnotes->isEmpty())
                                        <div class="grid grid-cols-3 gap-3 bg-slate-200 shadow-lg px-1 py-1">
                                            <div class="imagediv self-center">
                                                <a
                                                    href="{{ route('show', ['patchnote' => $gameliked->patchnotes->first()->slug]) }}">
                                                    <img src="{{ @App::make('url')->to('/') . '/storage' . $gameliked->patchnotes->first()->post_image }}"
                                                        class="object fill h-24 w-24" alt="">
                                                </a>
                                            </div>
                                            <div class="patchnote flex flex-col gap-1 col-start-2 col-end-4">
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
                                                <form action="{{ route('unlike.post', $gameliked->id) }}"
                                                    method="post">
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
