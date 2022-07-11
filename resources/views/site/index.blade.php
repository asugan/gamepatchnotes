@extends('layouts.main')
@section('content')
    <section class="game-slider mt-3">
        <div class="owl-carousel owl1">
            @foreach ($games as $game)
                <div class="item">
                    <img src="{{ @App::make('url')->to('/') . '/storage' . $game->game_image }}" alt="" />

                </div>
            @endforeach
        </div>
    </section>

    <section class="patchnotes">
        <div class="container">
            <div class="grid grid-cols-2 gap-4">
                <div class="">
                    <h1>Liked Games</h1>
                    @foreach ($likedgames as $gameliked)
                        <div class="rounded overflow-hidden shadow-lg mt-4 mb-4">
                            <div class="grid grid-cols-2 gap-2">
                                <div class="image">
                                    <img src="{{ @App::make('url')->to('/') . '/storage' . $gameliked->game_image }}"
                                        class="object-fill h-64 w-full" alt="">
                                </div>
                                <div class="second">
                                    <div class="text">
                                        <h1 class="text-3xl text-center	
                                    ">
                                            {{ $gameliked->game_name }}
                                        </h1>
                                    </div>
                                    @foreach ($gameliked->patchnotes as $patchnote)
                                        <div class="grid grid-cols-3 gap-3 mt-3">
                                            <div class="imagediv">
                                                <img src="{{ @App::make('url')->to('/') . '/storage' . $patchnote->post_image }}"
                                                    class="object fill h-24 w-24" alt="">
                                            </div>
                                            <div class="patchnote flex flex-col gap-1 col-start-2 col-end-4">
                                                <h1 class="text-lg">{{ $patchnote->post_title }}</h1>
                                                <p>{{ Illuminate\Support\Str::limit($patchnote->post_body, 50, $end = '...') }}
                                                </p>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="likebutton mt-8 flex justify-center">
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
                <div class="">
                    <h1>Latest Games</h1>
                    @foreach ($latest as $gameliked)
                        <div class="rounded overflow-hidden shadow-lg mt-4 mb-4">
                            <div class="grid grid-cols-2 gap-2">
                                <div class="image">
                                    <img src="{{ @App::make('url')->to('/') . '/storage' . $gameliked->game_image }}"
                                        class="object-fill h-64 w-full" alt="">
                                </div>
                                <div class="second">
                                    <div class="text">
                                        <h1 class="text-3xl text-center	
                                ">
                                            {{ $gameliked->game_name }}
                                        </h1>
                                    </div>
                                    @foreach ($gameliked->patchnotes as $patchnote)
                                        <div class="patchnote flex flex-row gap-4 mt-4">
                                            <img src="{{ @App::make('url')->to('/') . '/storage' . $patchnote->post_image }}"
                                                class="object fill h-24 w-24" alt="">
                                            <h1 class="text-lg">{{ $patchnote->post_title }}</h1>
                                        </div>
                                    @endforeach
                                    <div class="likebutton mt-8 flex justify-center">
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
