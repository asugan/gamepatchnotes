@extends('layouts.main')
@section('title', $post->blog_title . ' | Latest Patch Notes')
@section('description', $post->blog_description)
@section('og.title', $post->blog_title . ' | Latest Patch Notes')
@section('og.desc', $post->blog_description)
@section('og_image', $post->image)
@section('og.type', 'article')

@php

$output = nl2br(str_replace("&nbsp;", "</br>", $post->blog_body));

@endphp

@section('content')
    <article class="patchnotes" itemscope itemtype="http://schema.org/Article">
        <meta itemprop="mainEntityOfPage" content="{{ url()->current() }}">
        <meta itemprop="image" content="{{ $post->image }}">
        <meta itemprop="datePublished" content="{{ $post->created_at->format('d/m/Y') }}">
        <meta itemprop="dateModified" content="{{ $post->updated_at->format('d/m/Y') }}">
        <meta itemprop="author" content="LatestPatchNotes">
        <span itemscope="" itemtype="http://schema.org/Organization" itemprop="publisher">
            <meta itemprop="name" content="LatestPatchNotes">
            <meta itemprop="url" content="https://latestpatchnotes.com/">
            <span itemprop="logo" itemscope="" itemtype="https://schema.org/ImageObject">
                <meta itemprop="url" content="https://latestpatchnotes.com/images/logo2.png">
                <meta itemprop="width" content="512">
                <meta itemprop="height" content="512">
            </span>
        </span>
        <div class="pnheader py-8">
            <div class="container">
                <div class="breadcrumb flex justify-start items-center pb-8">
                    <nav class="bctext font-bold" aria-label="Breadcrumb">
                        <ol class="list-none p-0 inline-flex" itemscope itemtype="https://schema.org/BreadcrumbList">
                            <li class="flex items-center" itemprop="itemListElement" itemscope
                                itemtype="https://schema.org/ListItem">
                                <a itemprop="item" class="hover:underline" href="{{ route('welcome') }}"><span
                                        itemprop="name">Home</span></a>
                                <svg class="fill-current w-3 h-3 mx-3" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 320 512">
                                    <path
                                        d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z" />
                                </svg>
                                <meta itemprop="position" content="1" />
                            </li>
                            <li class="flex items-center" itemprop="itemListElement" itemscope
                                itemtype="https://schema.org/ListItem">
                                <a class="hover:underline" itemprop="item"
                                    href="{{ route('allblog') }}"> <span
                                        itemprop="name">Blog</span></a>
                                <svg class="fill-current w-3 h-3 mx-3" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 320 512">
                                    <path
                                        d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z" />
                                </svg>
                                <meta itemprop="position" content="2" />
                            </li>
                            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                <a itemprop="item" href="{{ route('showblog', ['post' => $post->slug]) }}"
                                    class="text-gray-400" aria-current="page"> <span
                                        itemprop="name">{{ $post->blog_title }}</span></a>
                                <meta itemprop="position" content="3" />
                            </li>
                        </ol>
                    </nav>
                </div>
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

        <div class="container" itemprop="articleBody">
            <div class="flex flex-col htext py-8">
                <h1 class="text-start text-3xl font-bold pb-4 text-blue-400" itemprop="headline">{{ $post->blog_title }}</h1>
                <img
                                class="rounded mb-3 hover:opacity-70 transition duration-300 ease-in-out md:w-8/12"
                                alt="{{ $post->blog_title }}" src="/storage/{{ $post->image }}" />
                <span class="text-blue-400 mt-2">Posted {{ $post->created_at->format('j F Y') }}</span>
                <p class="flex mt-3 mb-3"><span class="flex-grow text-gray-400">
                            Last
                            edited
                            <time itemprop="dateModified">{{ $post->updated_at->format('d/m/Y') }}</time>
                </span></p>
                <div class="steamcom">
                    <svg version="1.1" width="16" height="16" viewBox="0 0 16 16"
                        class="octicon octicon-check-circle-fill" aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M8 16A8 8 0 108 0a8 8 0 000 16zm3.78-9.72a.75.75 0 00-1.06-1.06L6.75 9.19 5.28 7.72a.75.75 0 00-1.06 1.06l2 2a.75.75 0 001.06 0l4.5-4.5z">
                        </path>
                    </svg>
                    <span>Blog Post</span>
                </div>
                <div class="pt-4 break-all blogcontainer">
                    {!! $output !!}
                </div>
            </div>
        </div>
    </article>
@endsection
