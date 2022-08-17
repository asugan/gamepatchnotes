@extends('layouts.main')
@section('title', 'Latest Patch Notes - All Patchnotes')
@section('description', 'We are publishing the latest patch notes for you.Check out all patch notes.')
@section('keywords', 'Patchnotes,Latest Patchnotes,Game Patchnotes,Game News,Game Latest Patchnotes,Game Latest,' .
    'News,Patchnotes for games,latest news')
@section('og.title', 'Latest Patch Notes - All Patchnotes')
@section('og.desc', 'We are publishing the latest patch notes for you.Check out all patch notes.')
@section('og.type', 'website')
@section('og_image', 'http://latestpatchnote.com/images/lpnotes.png')
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

    <section class="allpatchnotes">
        <div class="container mx-auto pt-4 pb-4">
            <h1 class="text-center text-4xl font-bold htext pb-8">All Patchnotes ({{ $patchnotescount }})</h1>
            <div class="overflow-x-auto relative">
                <table class="w-full text-left">
                    <thead class="tablehead">
                        <tr>
                            <th scope="col" class="py-3 px-6">Image</th>
                            <th scope="col" class="py-3 px-6">Date</th>
                            <th scope="col" class="py-3 px-6">Patch Title</th>
                            <th scope="col" class="py-3 px-6">Game ID</th>
                        </tr>
                    </thead>
                    <tbody class="tablebody">
                        @foreach ($hamham as $item)
                            <section class="{{ $item->slug }}">
                                <tr class="border-b hover:bg-indigo-800">
                                    <th scope="row"
                                        class="py-0 px-0 md:py-4 md:px-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <a class="bg-indigo-800 inline-block"
                                            href="{{ route('show', ['patchnote' => $item->slug]) }}">
                                            <img src="{{ $item->post_image }}" alt="{{ $item->post_title }}"
                                                class="patchnote_image hover:opacity-50 duration-300">
                                        </a>
                                    </th>
                                    <td class="py-4 px-4 md:whitespace-normal whitespace-nowrap">
                                        <a class="hover:underline"
                                            href="{{ route('show', ['patchnote' => $item->slug]) }}">{{ $item->created_at->format('d/m/Y') }}</a>
                                    </td>
                                    <td class="py-4 px-4 md:whitespace-normal whitespace-nowrap">
                                        <a class="hover:underline"
                                            href="{{ route('show', ['patchnote' => $item->slug]) }}">{{ $item->post_title }}
                                        </a>
                                    </td>
                                    <td class="py-4 px-6 whitespace-nowrap">
                                        <p>{{ $item->games_id }}</p>
                                    </td>
                                </tr>
                            </section>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-5">
                {{ $hamham->links() }}
            </div>
        </div>
    </section>

@endsection
