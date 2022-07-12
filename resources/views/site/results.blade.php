@extends('layouts.main')
@section('content')
    <div class="container pt-4 pb-4">
        <h1 class="text-center text-4xl font-bold">Results</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            @foreach ($results as $gameliked)
                <div class="likedgames justify-self-center">
                    <div class="bg-neutral-50 rounded overflow-hidden shadow-lg mt-4 mb-4">
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
                                <div class="grid grid-cols-3 gap-3 bg-slate-200 shadow-lg px-1 py-1">
                                    <div class="imagediv self-center">
                                        <img src="{{ @App::make('url')->to('/') . '/storage' . $gameliked->patchnotes->first()->post_image }}"
                                            class="object fill h-24 w-24" alt="">
                                    </div>
                                    <div class="patchnote flex flex-col gap-1 col-start-2 col-end-4">
                                        <h1 class="text-lg">{{ $gameliked->patchnotes->first()->post_title }}</h1>
                                        <p>
                                            {{ Illuminate\Support\Str::limit($gameliked->patchnotes->first()->post_body, 50, $end = '...') }}
                                            <br>
                                            <a href="" class="underline">Read the patchnote</a>
                                        </p>
                                    </div>
                                </div>
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
    </div>
@endsection
