@extends('layouts.app-master')

@section('content')
    <div class="row">
        <div class="col-12 mt-3">
            <h1 class="text-center">{{ $post->post_title }}</h1>
        </div>
        <div class="col-12 text-center mt-3">
            <img class="img-fluid " src="{{ @App::make('url')->to('/') . '/storage' . $post->post_image }}" alt="">
        </div>
        <div class="col-12 mt-3">
            <p>{{ $post->post_body }}</p>
        </div>
    </div>
@endsection
