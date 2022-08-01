@extends('layouts.main')
@section('title', 'Latest Patch Notes - Game Search Results')
@section('description', 'We publish the latest news and patchnotes about the games for you.Follow your game and get ' .
    'notification when game updated!')
@section('keywords', 'Patchnotes,Latest Patchnotes,Game Patchnotes,Game News,Game Latest Patchnotes,Game Latest,' .
    'News,Patchnotes for games,latest news')
@section('og.title', 'Latest Patch Notes - Game Search Results')
@section('og.desc', 'We publish the latest news and patchnotes about the games for you.Follow your game and get ' .
    'notification when game updated!')
@section('og.type', 'website')
@section('og_image', 'http://latestpatchnote.com/images/lpnotes.png')
@section('content')
    <div class="container pt-8">
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

    <div class="container py-8">
        <h1 class="text-center text-4xl font-bold pb-8">Total Results in DB : ({{ count($results) }}) </h1>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            @forelse ($results as $gameliked)
                <section class="{{ $gameliked->slug }}">
                    <div class="likedgames">
                        <div class="bg-neutral-50 rounded overflow-hidden shadow-lg">
                            <div class="grid grid-cols-1 xl:grid-cols-2">
                                <div class="firstgrid image p-4 self-center">
                                    <a class="bg-indigo-800 inline-block"
                                        href="{{ route('showcg', ['game' => $gameliked->slug]) }}">
                                        <img src="{{ $gameliked->game_image }}"
                                            class="h-64 w-full hover:opacity-50 duration-300" alt="">
                                    </a>
                                </div>
                                <div class="secondgrid px-2 flex flex-col justify-between">
                                    <div class="text">
                                        <a href="{{ route('showcg', ['game' => $gameliked->slug]) }}">
                                            <h1
                                                class="text-3xl text-center pt-4 pb-4 duration-150 hover:text-indigo-500
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
                                                    <h1 class="text-lg duration-150 hover:text-indigo-500">
                                                        {{ $gameliked->patchnotes->first()->post_title }}
                                                    </h1>
                                                </a>
                                                <a href="{{ route('show', ['patchnote' => $gameliked->patchnotes->first()->slug]) }}"
                                                    class="underline duration-150 hover:text-indigo-500">Read the
                                                    patchnote</a>
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
                                                        class="{{ $gameliked->liked() ? 'block' : 'hidden' }} inline-flex items-center h-12 px-8 m-2 text-sm text-indigo-100 transition-colors duration-150 bg-red-600 rounded-lg focus:shadow-outline hover:bg-indigo-800">
                                                        Remove From Favourite
                                                    </button>
                                                </form>
                                            @else
                                                <form action="{{ route('like.post', $gameliked->id) }}" method="post">
                                                    @csrf
                                                    <button
                                                        class="{{ $gameliked->liked() ? 'bg-blue-600' : '' }} inline-flex items-center h-12 px-8 m-2 text-sm text-indigo-100 transition-colors duration-150 bg-gray-600 rounded-lg focus:shadow-outline hover:bg-indigo-800">
                                                        Add to Favourite
                                                    </button>
                                                </form>
                                            @endif
                                        </td>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            @empty
                <h1 class="text-center text-4xl font-bold pb-4 col-start-1 col-end-3 pt-16">Nothing Found...</h1>
            @endforelse
        </div>
        <div class="mt-5">
            {{ $results->links() }}
        </div>
    </div>
@endsection
