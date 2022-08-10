@extends('layouts.main')
@section('title', 'Latest Patch Notes - Followed Games')
@section('description', 'You can add the games to your favorites by signing up or logging in immediately,and you can' .
    ' easily follow the patch notes.')
@section('keywords', 'Patchnotes,Latest Patchnotes,Game Patchnotes,Game News,Game Latest Patchnotes,Game Latest,' .
    'News,Patchnotes for games,latest news')
@section('og.title', 'Latest Patch Notes - Followed Games')
@section('og.desc', 'You can add the games to your favorites by signing up or logging in immediately,and you can easily'
    . ' follow the patch notes.')
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

    <section class="allgames">
        <div class="container mx-auto pt-4 pb-4">
            <h1 class="text-center text-4xl font-bold pb-8 htext">Followed Games ({{ $gamecount }})</h1>
            @auth
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
            @endauth
            @guest
                <div class="guest pt-16">
                    <h1 class="text-center text-4xl font-bold htext">Please Login for Follow a Game !</h1>
                    <div class="flex justify-center pt-8">
                        <a class="inline-flex items-center h-12 px-8 m-2 text-sm text-indigo-100 transition-colors duration-150 bg-gray-600 rounded-lg focus:shadow-outline hover:bg-indigo-800"
                            href="/register">Register</a>
                        <a class="inline-flex items-center h-12 px-8 m-2 text-sm text-indigo-100 transition-colors duration-150 bg-gray-600 rounded-lg focus:shadow-outline hover:bg-indigo-800"
                            href="/login">Login</a>
                    </div>
                </div>
            @endguest
            <div class="mt-5">
                {{ $games->links() }}
            </div>
        </div>
    </section>
@endsection
