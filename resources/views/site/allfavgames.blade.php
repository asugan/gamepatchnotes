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

    <div class="container pb-8">
        <h1 class="text-center text-4xl font-bold pb-4">Followed Games</h1>
        @auth
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach ($games as $gameliked)
                    <div class="likedgames justify-self-center">
                        <div class="bg-neutral-50 rounded overflow-hidden shadow-lg">
                            <div class="grid grid-cols-1 lg:grid-cols-2">
                                <div class="firstgrid image p-2 self-center">
                                    <img src="{{ @App::make('url')->to('/') . '/storage' . $gameliked->game_image }}"
                                        class="object-fill h-64 w-full" alt="">
                                </div>
                                <div class="secondgrid pr-2 pl-2 lg:pl-0 flex flex-col justify-between">
                                    <div class="text">
                                        <h1 class="text-3xl text-center pt-4 pb-4
                        ">
                                            {{ $gameliked->game_name }}
                                        </h1>
                                    </div>
                                    @foreach ($gameliked->patchnotes as $patchnote)
                                        <div class="grid grid-cols-3 gap-3 bg-slate-200 shadow-lg px-1 py-1">
                                            <div class="imagediv self-center">
                                                <img src="{{ @App::make('url')->to('/') . '/storage' . $patchnote->post_image }}"
                                                    class="object fill h-24 w-24" alt="">
                                            </div>
                                            <div class="patchnote flex flex-col gap-1 col-start-2 col-end-4">
                                                <h1 class="text-lg">{{ $patchnote->post_title }}</h1>
                                                <p>
                                                    {{ Illuminate\Support\Str::limit($patchnote->post_body, 50, $end = '...') }}
                                                    <br>
                                                    <a href="" class="underline">Read the patchnote</a>
                                                </p>
                                            </div>
                                        </div>
                                    @endforeach
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
                    </div>
                @endforeach
            </div>
        @endauth
        @guest
            <div class="guest pt-16">
                <h1 class="text-center text-4xl font-bold">Please Login for Follow a Game !</h1>
                <div class="flex justify-center pt-8">
                    <a class="inline-flex items-center h-12 px-8 m-2 text-sm text-indigo-100 transition-colors duration-150 bg-gray-600 rounded-lg focus:shadow-outline hover:bg-indigo-800"
                        href="/register">Register</a>
                    <a class="inline-flex items-center h-12 px-8 m-2 text-sm text-indigo-100 transition-colors duration-150 bg-gray-600 rounded-lg focus:shadow-outline hover:bg-indigo-800"
                        href="/login">Login</a>
                </div>
            </div>
        @endguest
        <div class="">
            {{ $games->links() }}
        </div>
    </div>
@endsection
