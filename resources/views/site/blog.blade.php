@extends('layouts.main')
@section('title', 'Latest Patch Notes | Blog')
@section('description', 'Latest Patch Notes Blog Page for articles,game news and latest news.')
@section('og.title', 'Latest Patch Notes | All Blog')
@section('og.desc', 'Latest Patch Notes Blog Page for articles,game news and latest news.')
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

        <h1 class="text-4xl font-bold htext tbaslik">Blog Page</h1>
        <h2 class="text-2xl py-4 htext">Everything About Games !</h2>
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
            @foreach ($posts as $post)
            <div class="flex flex-col justify-center mt-5 mb-5 border-b-2 border-gray-600"> 
                    <div class="md:mr-4 mb-2 md:mb-0">
                        <a class="bg-gray-100" href="{{ route('showblog', ['post' => $post->slug]) }}">
                            <img
                                class="rounded mb-3 hover:opacity-70 transition duration-300 ease-in-out md:w-8/12"
                                alt="{{ $post->blog_title }}" src="storage/{{ $post->image }}" /></a>
                    </div>

                    <div class="flex-1">

                        <a href="{{ route('showblog', ['post' => $post->slug]) }}">
                            <h2 class="text-2xl bctext font-bold mb-1">{{ $post->blog_title }}</h2>
                        </a>

                        <p class="font-light htext mb-4 mt-2">{{ $post->blog_description }}</p>

                          <a href="{{ route('showblog', ['post' => $post->slug]) }}">
                            <h2 class="text-2xl bctext font-bold mb-1">Read More -></h2>
                        </a>
                    </div>
            </div>
            @endforeach

            <div class="mt-5 mb-5">
                {{ $posts->links() }}
            </div>
        </div>

    </section>

@endsection
