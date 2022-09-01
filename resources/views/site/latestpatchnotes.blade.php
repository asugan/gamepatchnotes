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
