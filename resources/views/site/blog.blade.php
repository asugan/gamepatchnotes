@extends('layouts.main')
@section('title', 'Latest Patch Notes | All Games')
@section('description', 'We are publishing the latest games with patchnotes for you.Check out all published games.')
@section('og.title', 'Latest Patch Notes | All Games')
@section('og.desc', 'We are publishing the latest games with patchnotes for you.Check out all published games')
@section('og.type', 'website')
@section('og_image', 'http://latestpatchnote.com/images/lpnotes.png')
@section('content')

    <div class="container pt-8">
        <div class="breadcrumb flex justify-start items-center pb-8">
            <nav class="bctext font-bold" aria-label="Breadcrumb">
                <ol class="list-none p-0 inline-flex" itemscope itemtype="https://schema.org/BreadcrumbList">
                    <li class="flex items-center" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                        <a itemprop="item" class="hover:underline" href="{{ route('welcome') }}"><span
                                itemprop="name">Home</span></a>
                        <svg class="fill-current w-3 h-3 mx-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                            <path
                                d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z" />
                        </svg>
                        <meta itemprop="position" content="1" />
                    </li>
                    <li class="flex items-center" itemprop="itemListElement" itemscope
                        itemtype="https://schema.org/ListItem">
                        <a class="hover:underline" itemprop="item" href="{{ route('allblog') }}"> <span
                                itemprop="name">Blog</span></a>
                        <meta itemprop="position" content="2" />
                    </li>
                </ol>
            </nav>
        </div>
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

    <section class="allgames">

        <div class="container">
            <div class="flex flex-col md:flex-row w-full lg:w-10/12">

                @foreach ($posts as $post)
                    <div class="md:mr-4 mb-2 md:mb-0 md:w-4/12 ">
                        <a class="bg-gray-100" href="#">
                            <img width="640" height="360"
                                class="rounded mb-3 hover:opacity-70 transition duration-300 ease-in-out"
                                alt="{{ $post->image }}" src="storage/{{ $post->image }}" /></a>
                    </div>

                    <div class="flex-1">
                        <div class="flex items-center">
                            <div class="flex ml-4">
                            </div>
                        </div>

                        <a href="#" class="hover:text-green-400">
                            <h2 class="text-2xl font-semibold mb-1">{{ $post->blog_title }}</h2>
                        </a>

                        <p class="text-base font-light text-gray-600 mb-4">{{ $post->blog_description }}</p>

                    </div>
            </div>
            @endforeach

            <div class="mt-5">
                {{ $posts->links() }}
            </div>
        </div>

    </section>

@endsection
