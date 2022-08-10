<!doctype html>
<html lang="en">

<head>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4215212273469017"
        crossorigin="anonymous"></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-NGPHW8JVNQ"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-NGPHW8JVNQ');
    </script>
    <!-- Metas -->
    <meta charset="UTF-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="title" content="@yield('title')">
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">
    <meta name="language" content="English">
    <meta name="author" content="LatestPatchNotes">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url()->current() }}/">
    <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon" />
    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="@yield('og.type')">
    <meta property="og:title" content="@yield('og.title')">
    <meta property="og:description" content="@yield('og.desc')">
    <meta property="og:url" content="{{ url()->current() }}/">
    <meta property="og:site_name" content="Latest Patch Notes">
    <meta property="og:image" content="@yield('og_image')">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:label1" content="Est. reading time">
    <meta name="twitter:data1" content="1 minute">

    <!-- Title  -->
    <title>@yield('title')</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}" />
    <!--Css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet" />

</head>

<body>
    <div class="flex flex-col h-screen">

        <div class="navigbg bg-black shadow-lg pt-3 pb-3 border-b-2 border-gray-600">
            <nav class="flex justify-between container">
                <div class="logo">
                    <a href="/">
                        <img src="{{ asset('images/logo2.png') }}" alt="latestpatchnotes" class="w-24">
                    </a>
                </div>
                <div class="navlist flex items-center">
                    <ul class="hidden xl:flex flex-row gap-4 font-bold items-center htext">
                        <li>
                            <a href="{{ route('welcome') }}"
                                class="duration-150 text-sm hover:text-indigo-500 hover:underline">Home</a>
                        </li>
                        <li>
                            <a href="{{ route('allgames') }}"
                                class="duration-150 text-sm hover:text-indigo-500 hover:underline">All Games</a>
                        </li>
                        <li>
                            <a href="{{ route('lpatchnotes') }}"
                                class="duration-150 text-sm hover:text-indigo-500 hover:underline">All
                                Patchnotes</a>
                        </li>
                        <li>
                            <a href="{{ route('followedgames') }}"
                                class="duration-150 text-sm hover:text-indigo-500 hover:underline">Followed
                                Games</a>
                        </li>
                        @guest
                            <li>
                                <a href="{{ route('register.show') }}"
                                    class="duration-150 text-sm hover:text-indigo-500 hover:underline">Register</a>
                            </li>
                            <li>
                                <a href="{{ route('login.show') }}"
                                    class="duration-150 text-sm hover:text-indigo-500 hover:underline">Login</a>
                            </li>
                            <li>
                                <a href="/auth/steam" class="hover:text-indigo-500 hover:underline"><svg version="1.1"
                                        width="20" height="20" viewBox="0 0 16 16" class="octicon octicon-steam"
                                        aria-hidden="true">
                                        <path
                                            d="M8 0a8 8 0 00-8 7.47c.07.1.13.21.18.32l4.15 1.67a2.2 2.2 0 011.31-.36l1.97-2.8v-.04c0-1.65 1.37-3 3.05-3a3.03 3.03 0 013.05 3 3.03 3.03 0 01-3.12 3l-2.81 1.97c0 .3-.05.6-.17.9a2.25 2.25 0 01-4.23-.37L.4 10.56A8.01 8.01 0 108 0zm2.66 4.27c-1.12 0-2.03.9-2.03 2s.91 1.99 2.03 1.99c1.12 0 2.03-.9 2.03-2s-.9-2-2.03-2zm0 .5c.85 0 1.53.66 1.53 1.49s-.68 1.5-1.53 1.5c-.84 0-1.52-.67-1.52-1.5s.68-1.5 1.52-1.5zM5.57 9.6c-.22 0-.43.04-.62.11l1.02.42c.65.26.95.99.68 1.62-.27.63-1 .93-1.65.67l-1-.4a1.73 1.73 0 003.13-.08c.18-.42.18-.88.01-1.3A1.69 1.69 0 005.57 9.6z">
                                        </path>
                                    </svg>
                                    <span>Sign in</span></a>
                            </li>
                        @endguest
                        @auth
                            @role('admin')
                                <li>
                                    <a href="/admin" class="duration-150 text-sm hover:text-indigo-500 hover:underline">Admin
                                        Panel</a>
                                </li>
                            @endrole
                            <li>
                                <a href="{{ route('logout.perform') }}"
                                    class="duration-150 text-sm hover:text-indigo-500 hover:underline">Logout</a>
                            </li>
                        @endauth
                    </ul>
                </div>
                <div class="xl:hidden navlist md flex items-center">
                    <ul class="flex flex-row gap-4 font-bold htext items-center">
                        @guest
                            <li>
                                <a href="{{ route('register.show') }}"
                                    class="duration-150 text-sm hover:text-indigo-500 hover:underline">Register</a>
                            </li>
                            <li>
                                <a href="{{ route('login.show') }}"
                                    class="duration-150 text-sm hover:text-indigo-500 hover:underline">Login</a>
                            </li>
                            <li>
                            <li>
                                <a href="/auth/steam" class="hover:text-indigo-500 hover:underline"><svg version="1.1"
                                        width="20" height="20" viewBox="0 0 16 16" class="octicon octicon-steam"
                                        aria-hidden="true">
                                        <path
                                            d="M8 0a8 8 0 00-8 7.47c.07.1.13.21.18.32l4.15 1.67a2.2 2.2 0 011.31-.36l1.97-2.8v-.04c0-1.65 1.37-3 3.05-3a3.03 3.03 0 013.05 3 3.03 3.03 0 01-3.12 3l-2.81 1.97c0 .3-.05.6-.17.9a2.25 2.25 0 01-4.23-.37L.4 10.56A8.01 8.01 0 108 0zm2.66 4.27c-1.12 0-2.03.9-2.03 2s.91 1.99 2.03 1.99c1.12 0 2.03-.9 2.03-2s-.9-2-2.03-2zm0 .5c.85 0 1.53.66 1.53 1.49s-.68 1.5-1.53 1.5c-.84 0-1.52-.67-1.52-1.5s.68-1.5 1.52-1.5zM5.57 9.6c-.22 0-.43.04-.62.11l1.02.42c.65.26.95.99.68 1.62-.27.63-1 .93-1.65.67l-1-.4a1.73 1.73 0 003.13-.08c.18-.42.18-.88.01-1.3A1.69 1.69 0 005.57 9.6z">
                                        </path>
                                    </svg>
                                    <span>Sign in</span></a>
                            </li>
                            </li>
                        @endguest
                        @auth
                            <li>
                                <a href="{{ route('welcome') }}"
                                    class="duration-150 text-sm hover:text-indigo-500 hover:underline">Home</a>
                            </li>
                            <li>
                                <a href="{{ route('followedgames') }}"
                                    class="duration-150 text-sm hover:text-indigo-500 hover:underline">Followed
                                    Games</a>
                            </li>
                            <li>
                                <a href="{{ route('logout.perform') }}"
                                    class="duration-150 text-sm hover:text-indigo-500 hover:underline">Logout</a>
                            </li>
                        @endauth
                    </ul>
                </div>
                <div class="xl:hidden flex items-center">
                    <button class="outline-none mobile-menu-button">
                        <svg class=" w-6 h-6 text-gray-500 hover:text-green-500 " x-show="!showMenu" fill="none"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </nav>
            <div class="hidden mobile-menu text-center">
                <ul class="htext">
                    <li class="active"><a href="/"
                            class="block text-sm px-2 py-4 text-white bg-indigo-800 font-semibold">Home</a></li>
                    <li><a href="/games"
                            class="block text-sm px-2 py-4 hover:bg-indigo-800 hover:text-white transition duration-300">All
                            Games</a>
                    </li>
                    <li><a href="/latestnotes"
                            class="block text-sm px-2 py-4 hover:bg-indigo-800 hover:text-white transition duration-300">All
                            Patchnotes</a>
                    </li>
                    <li><a href="/favgames"
                            class="block text-sm px-2 py-4 hover:bg-indigo-800 hover:text-white transition duration-300">Followed
                            Games</a>
                    </li>
                    @guest
                        <li><a href="/register"
                                class="block text-sm px-2 py-4 hover:bg-indigo-800 hover:text-white transition duration-300">Register</a>
                        </li>
                        <li><a href="/login"
                                class="block text-sm px-2 py-4 hover:bg-indigo-800 hover:text-white transition duration-300">Login</a>
                        </li>
                        <li><a href="/auth/steam"
                                class="block text-sm px-2 py-4 hover:bg-indigo-800 hover:text-white transition duration-300">Login
                                with
                                Steam</a>
                        </li>
                    @endguest
                    @auth
                        <li><a href="/logout"
                                class="block text-sm px-2 py-4 hover:bg-indigo-800 hover:text-white transition duration-300">Logout</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>

        <div class="background flex-grow">
            @yield('content')
        </div>

        <footer class="navbg py-4 htext border-t-2 border-gray-600">
            <div class="container">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 md:gap-0">
                    <div class="flex flex-col justify-center items-center">
                        <div class="baslik text-center text-xl pb-2">
                            <h5>Social Media</h5>
                        </div>
                        <div class="social flex gap-4">
                            <a href="#">
                                <i
                                    class="fa-brands fa-twitter-square fa-4x text-gray-600 hover:text-indigo-800 transition duration-150"></i>
                            </a>
                            <a href="#">
                                <i
                                    class="fa-brands fa-facebook-square fa-4x text-gray-600 hover:text-indigo-800 transition duration-150"></i>
                            </a>
                            <a href="#">
                                <i
                                    class="fa-brands fa-instagram-square fa-4x text-gray-600 hover:text-indigo-800 transition duration-150"></i>
                            </a>
                        </div>
                    </div>

                    <div class="middle">
                        <div class="flex text-xl justify-center text-center">
                            <ul class="text-lg">
                                <li>
                                    <a href="{{ route('welcome') }}"
                                        class="duration-150 hover:text-indigo-500 hover:underline">Home</a>
                                </li>
                                <li>
                                    <a href="{{ route('allgames') }}"
                                        class="duration-150 hover:text-indigo-500 hover:underline">All
                                        Games</a>
                                </li>
                                <li>
                                    <a href="{{ route('followedgames') }}"
                                        class="duration-150 hover:text-indigo-500 hover:underline">Followed
                                        Games</a>
                                </li>
                                <li>
                                    <a href="{{ route('register.show') }}"
                                        class="duration-150 hover:text-indigo-500 hover:underline">Register</a>
                                </li>
                                <li>
                                    <a href="{{ route('login.show') }}"
                                        class="duration-150 hover:text-indigo-500 hover:underline">Login</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="firstgrid flex flex-col gap-3 justify-center items-center">
                        <div class="logo"><a href="/">
                                <img src="{{ asset('images/logo2.png') }}" alt="latestpatchnotes" class="w-40">
                            </a>
                        </div>
                        <div class="footercopyright">
                            <span>©2022 LatestPatchNotes</span>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
</body>

</html>
