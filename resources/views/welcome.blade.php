@extends('layouts.main')
@section('content')
    <section class="game-slider mt-2">
        <div class="owl-carousel owl1">
            @foreach ($games as $game)
                <div class="item">
                    <img src="{{ @App::make('url')->to('/') . '/storage' . $game->game_image }}" alt="" />
                    <td class="px-6 py-4 text-sm text-gray-500 border-b border-gray-200 ">
                        @if ($game->liked())
                            <form action="{{ route('unlike.post', $game->id) }}" method="post">
                                @csrf
                                <button class="{{ $game->liked() ? 'block' : 'hidden' }} px-4 py-2 text-white bg-red-600">
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
            @endforeach
        </div>
    </section>

    <section class="patch-slider bg-dark mt-2">
        <div class="container pt-4">
            <div class="owl-carousel owl2">
                @foreach ($games as $game)
                    @foreach ($game->patchnotes as $patchnote)
                        <div class="item">
                            <img alt=""
                                src="{{ @App::make('url')->to('/') . '/storage' . $patchnote->post_image }}" />
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div>
    </section>

    <section class="game-info mt-2">
        <div class="container">
            <div class="row">
                <div class="col-9">
                    <h1>Favourite Games</h1>
                    @auth
                        @foreach ($likedgames as $gameliked)
                            <h1>{{ $gameliked->game_name }}</h1>
                            @foreach ($gameliked->patchnotes as $patchnote)
                                <h2>{{ $patchnote->post_title }}</h2>
                            @endforeach
                        @endforeach
                    @endauth
                    @guest
                        <h5>Register for add games to Favourite...</h5>
                        <a class="btn btn-danger" href="{{ route('register.show') }}" role="button">Register</a>
                    @endguest
                </div>
                <div class="col-3">
                    <h3>Categories</h3>
                </div>
            </div>
        </div>
    </section>
@endsection
