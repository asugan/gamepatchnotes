<!doctype html>
<html lang="en" class="no-js">

<head>
    <!-- Metas -->
    <meta charset="UTF-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="title" content="@yield('title')">
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">
    <meta name="language" content="English">
    <meta name="author" content="Skidrow and Codex Torrent">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url()->current() }}/">
    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="website">
    <meta property="og:title" content="All Patch Notes - Every News and Patch Releases for Games">
    <meta property="og:description"
        content="Find the Most Popular Games Updates, News and Patch Notes when the developer releases. Follow your game and get notifications when updated.">
    <meta property="og:url" content="{{ url()->current() }}/">
    <meta property="og:site_name" content="All Patch Notes">
    <meta property="article:publisher" content="https://www.facebook.com/allpatchnotes">
    <meta property="article:published_time" content="2022-06-08T12:09:44+00:00">
    <meta property="article:modified_time" content="2022-02-24T08:31:04+00:00">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:label1" content="Est. reading time">
    <meta name="twitter:data1" content="1 minute">

    <!-- Title  -->
    <title>@yield('title')</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}" />
    <!--Css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <div class="flex flex-col h-screen">

        <div class="navbg bg-neutral-50 shadow-lg pt-3 pb-3">
            <nav class="flex justify-between container">
                <div class="logo">
                    <a href="/">
                        <img src="https://www.logodesignlove.com/wp-content/uploads/2022/01/logo-wave-symbol-01.jpg"
                            alt="" class="w-12">
                    </a>
                </div>
                <div class="navlist flex items-center">
                    <ul class="hidden xl:flex flex-row gap-4 font-bold uppercase items-center">
                        <li>
                            <a href="/" class="duration-150 hover:text-indigo-500 hover:underline">Home</a>
                        </li>
                        <li>
                            <a href="/games" class="duration-150 hover:text-indigo-500 hover:underline">All Games</a>
                        </li>
                        <li>
                            <a href="/latestnotes" class="duration-150 hover:text-indigo-500 hover:underline">All
                                Patchnotes</a>
                        </li>
                        <li>
                            <a href="/favgames" class="duration-150 hover:text-indigo-500 hover:underline">Followed
                                Games</a>
                        </li>
                        @guest
                            <li>
                                <a href="/register" class="duration-150 hover:text-indigo-500 hover:underline">Register</a>
                            </li>
                            <li>
                                <a href="/login" class="duration-150 hover:text-indigo-500 hover:underline">Login</a>
                            </li>
                            <li>
                                <a href="/auth/steam" class="bg-indigo-800 inline-block"><img
                                        class="w-48 hover:opacity-50 duration-300"
                                        src="https://www.luvclan.nl/images/steam_login_bar.png" alt=""></a>
                            </li>
                        @endguest
                        @auth
                            <li>
                                <a href="/logout" class="duration-150 hover:text-indigo-500 hover:underline">Logout</a>
                            </li>
                        @endauth
                    </ul>
                </div>
                <div class="xl:hidden navlist md flex items-center">
                    <ul class="flex flex-row gap-4 font-bold uppercase items-center">
                        @guest
                            <li>
                                <a href="/register" class="duration-150 hover:text-indigo-500 hover:underline">Register</a>
                            </li>
                            <li>
                                <a href="/login" class="duration-150 hover:text-indigo-500 hover:underline">Login</a>
                            </li>
                            <li>
                                <a href="/auth/steam" class="bg-indigo-800 inline-block"><img
                                        class="w-48 hover:opacity-50 duration-300"
                                        src="https://www.luvclan.nl/images/steam_login_bar.png" alt=""></a>
                            </li>
                        @endguest
                        @auth
                            <li>
                                <a href="/logout" class="duration-150 hover:text-indigo-500 hover:underline">Logout</a>
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
                <ul class="">
                    <li class="active"><a href="/"
                            class="block text-sm px-2 py-4 text-white bg-indigo-800 font-semibold">Home</a></li>
                    <li><a href="/games"
                            class="block text-sm px-2 py-4 hover:bg-indigo-800 hover:text-white transition duration-300">All
                            Games</a>
                    </li>
                    <li><a href="/lnotes"
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

        <div class="background bg-slate-200 flex-grow">
            @yield('content')
        </div>

        <footer class="navbg bg-neutral-50 shadow-lg py-4">
            <div class="container">
                <div class="grid grid-cols-1 md:grid-cols-3">
                    <div class="firstgrid flex gap-3 justify-center items-center">
                        <div class="logo"><img
                                src="https://www.logodesignlove.com/wp-content/uploads/2022/01/logo-wave-symbol-01.jpg"
                                alt="" class="w-24">
                        </div>
                        <div class="text text-2xl">
                            <h1>Gamepatchnotes®</h1>
                        </div>
                    </div>
                    <div class="middle">
                        <div class="flex text-xl justify-center text-center">
                            <ul>
                                <li>
                                    <a href="#"
                                        class="duration-150 hover:text-indigo-500 hover:underline">Home</a>
                                </li>
                                <li>
                                    <a href="#" class="duration-150 hover:text-indigo-500 hover:underline">All
                                        Games</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="duration-150 hover:text-indigo-500 hover:underline">Followed Games</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="duration-150 hover:text-indigo-500 hover:underline">About</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="duration-150 hover:text-indigo-500 hover:underline">Contact</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="flex flex-col justify-center items-center">
                        <div class="baslik text-center text-2xl pb-2">
                            <h1>Social Media</h1>
                        </div>
                        <div class="social flex gap-4">
                            <i class="fa-brands fa-twitter-square fa-4x"></i>
                            <i class="fa-brands fa-facebook-square fa-4x"></i>
                            <i class="fa-brands fa-instagram-square fa-4x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" src="{{ asset('js/sliders.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
</body>

</html>
