@extends('layouts.main')
@section('content')
    <div class="container pt-8 pb-8">
        <div class="flex flex-col items-center bg-neutral-50 shadow-lg mb-4">
            <h1 class="text-center text-4xl font-bold py-4 px-24">{{ $patchnote->post_title }}</h1>
            <img class="object-fill h-64 w-48" src="{{ @App::make('url')->to('/') . '/storage' . $patchnote->post_image }}"
                alt="">
            <p class="px-4 pb-8 pt-4 md:px-24">
                {{ $patchnote->post_body }}
            </p>
        </div>
    </div>
@endsection
