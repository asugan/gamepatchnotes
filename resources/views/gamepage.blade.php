@extends('layout.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>{{ $game->game_name }}</h1>
                @foreach ($patchnote as $patchnotes)
                    <h3>{{ $patchnotes->post_title }}</h3>
                @endforeach
            </div>
        </div>
    </div>
@endsection
