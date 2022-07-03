@extends('layout.main')
@section('content')
    <section class="game-slider mt-2">
        <div class="owl-carousel owl1">
            @foreach ($games as $game)
                <div class="item">
                    <img src="{{ url('storage/' . $game->game_image) }}" alt="" />
                </div>
            @endforeach
        </div>
    </section>
    <section class="patch-slider bg-dark mt-2">
        <div class="container pt-4">
            <div class="owl-carousel owl2">
                @foreach ($games as $game)
                    @foreach ($patchnotes as $patchnote)
                        <div class="item">
                            <img alt="" src="{{ url('storage/' . $patchnote->post_image) }}" />
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
                    <h3>Latest Posts</h3>
                </div>
                <div class="col-3">
                    <h3>Categories</h3>
                </div>
            </div>
        </div>
    </section>
@endsection
