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
        <div class="breadcrumb flex justify-start items-center pb-8">
            <nav class="bctext font-bold" aria-label="Breadcrumb">
                <ol class="list-none p-0 inline-flex">
                    <li class="flex items-center">
                        <a class="hover:underline" href="{{ route('welcome') }}">Home</a>
                        <svg class="fill-current w-3 h-3 mx-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                            <path
                                d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z" />
                        </svg>
                    </li>
                    <li class="flex items-center">
                        <a class="hover:underline" href="{{ route('lpatchnotes') }}">Latest Patchnotes</a>
                    </li>
                </ol>
            </nav>
        </div>
        <h1 class="text-4xl font-bold tbaslik">Latest Patchnotes</h1>
        <h2 class="text-2xl py-4 htext">Curated patch notes for Steam games</h3>
            <p class="htext">We track every new build on Steam, and try connect these builds
                to
                announcements
                by
                the game developers in
                their hub.</p>
    </div>

    <div class="container mt-5">
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4215212273469017"
            crossorigin="anonymous"></script>
        <!-- Yatay -->
        <ins class="adsbygoogle text-center" style="display:block;" data-ad-client="ca-pub-4215212273469017"
            data-ad-slot="1904430142" data-ad-format="auto" data-full-width-responsive="true"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
    </div>

    <section class="allpatchnotes">
        <div class="container mx-auto pt-4 pb-4">
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
                            @foreach ($cumcum->where('id', $item->games_id) as $cum)
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
                                            <a class="hover:underline"
                                                href="{{ route('showcg', ['game' => $cum->slug]) }}">{{ $item->games_id }}</a>
                                        </td>
                                    </tr>
                                </section>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>

@endsection
