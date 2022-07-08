@extends('layouts.app-master')

@section('content')
    <div class="row">
        <div class="col-12 mt-3">
            <h1 class="text-center">{{ $post->game_name }}</h1>
        </div>
        <div class="col-12 text-center mt-3">
            <img class="img-fluid " src="{{ @App::make('url')->to('/') . '/storage' . $post->game_image }}" alt="">
        </div>
        <div class="col-6 mt-3">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Platform: {{ $post->game_platform }}</li>
                <li class="list-group-item">Release Date: {{ $post->release_date }}</li>
                <li class="list-group-item">Genre: {{ $post->genre }}</li>
                <li class="list-group-item">Developer: {{ $post->developer }}</li>
            </ul>
        </div>
    </div>
@endsection
