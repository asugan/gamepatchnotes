@extends('layouts.main')
@section('content')
    <div class="container pt-8">
        <form action="{{ route('searchpn') }}" method="get">
            {{ csrf_field() }}
            <div class="flex items-center justify-center">
                <div class="flex border-2 rounded">
                    <input name="search" type="text" class="px-4 py-2 w-80" placeholder="Search a Patchnote!">
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
    <div class="container py-8">
        <div class="flex flex-col gap-8">
            <h1 class="text-center text-3xl">Total Results in DB : ({{ count($results) }})</h1>
            @foreach ($results as $item)
                <div
                    class="patchnote bg-neutral-50 shadow-lg grid grid-cols-1 md:grid-cols-4 md:gap-4 text-center md:text-left py-2 items-center">
                    <div class="grid1 md:col-start-1 md:col-end-2">
                        <a href="{{ route('show', ['patchnote' => $item->slug]) }}">
                            <h3 class="text-xl text-center duration-150 hover:text-indigo-500">APP ID :
                                {{ $item->games_id }}</h3>
                        </a>
                    </div>
                    <div class="grid2 md:col-start-2 md:col-end-3 justify-self-center px-2 py-2">
                        <a class="bg-indigo-800 inline-block" href="{{ route('show', ['patchnote' => $item->slug]) }}">
                            <img src="{{ $item->post_image }}" alt=""
                                class="w-32 h-16 ml-2 md:ml-0 hover:opacity-50 duration-300">
                        </a>
                    </div>
                    <div class="grid3 md:col-start-3 md:col-end-5 md:pr-8 pr-0">
                        <a href="{{ route('show', ['patchnote' => $item->slug]) }}">
                            <h1 class="text-xl py-4 duration-150 hover:text-indigo-500">{{ $item->post_title }}</h1>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-5">
            {{ $results->links() }}
        </div>
    </div>
@endsection
