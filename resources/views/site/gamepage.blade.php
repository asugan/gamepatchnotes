@extends('layouts.main')
@section('content')
    <div class="container pt-8 pb-8">
        <div class="grid md:grid-cols-4 grid-cols-1 gap-4">
            <div class="game md:col-start-4 md:col-end-5">
                <div class="flex flex-col items-center bg-neutral-50 shadow-lg">
                    <h1 class="text-center text-4xl font-bold pb-4 pt-4">{{ $game->game_name }}</h1>
                    <img class="object-fill h-64 w-48"
                        src="{{ @App::make('url')->to('/') . '/storage' . $game->game_image }}" alt="">
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
                                        class="{{ $game->liked() ? 'block' : 'hidden' }} px-4 py-2 text-white bg-red-600">
                                        Remove From Favourite
                                    </button>
                                </form>
                            @else
                                <form action="{{ route('like.post', $game->id) }}" method="post">
                                    @csrf
                                    <button
                                        class="{{ $game->liked() ? 'bg-blue-600' : '' }} px-4 py-2 text-white bg-gray-600">
                                        Add to Favourite
                                    </button>
                                </form>
                            @endif
                        </td>
                    </div>
                </div>
            </div>
            <div class="patchnote md:col-start-1 md:col-end-4 md:row-start-1">
                @foreach ($game->patchnotes as $patchnote)
                    <div class="flex flex-col items-center bg-neutral-50 shadow-lg mb-4">
                        <a href="{{ route('show', ['patchnote' => $patchnote->slug]) }}">
                            <h1 class="text-center text-4xl font-bold py-4 px-24">{{ $patchnote->post_title }}</h1>
                        </a>
                        <a href="{{ route('show', ['patchnote' => $patchnote->slug]) }}">
                            <img class="object-fill h-64 w-48"
                                src="{{ @App::make('url')->to('/') . '/storage' . $patchnote->post_image }}"
                                alt="">
                        </a>
                        <p class="px-4 py-4 md:px-24">
                            {{ Illuminate\Support\Str::limit($patchnote->post_body, 500, $end = '...') }}
                        </p>
                        <a class="inline-flex items-center h-12 px-8 mb-6 m-2 text-sm text-indigo-100 transition-colors duration-150 bg-gray-600 rounded-lg focus:shadow-outline hover:bg-indigo-800"
                            href="{{ route('show', ['patchnote' => $patchnote->slug]) }}">Read the Patchnote</a>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
@endsection
