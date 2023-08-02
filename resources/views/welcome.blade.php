<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SIMONEV</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <style>
        body {
            background-image: url("public\img\simonev1.png");
            width: 100%;
            height: auto;
        }
    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased bg-center bg-cover ">
    <div class="p-2 flex flex-col sm:flex-row items-center justify-between">
        <a href="#" class="flex text-xl text-gray-900 dark:text-black font-bold py-6 px-6">
            <img class="w-10 h-8 mr-2" src="{{ URL('img/logo BPS.png') }}" alt="logo">
            Badan Pusat Statistik
        </a>
        @if (Route::has('login'))
        <div class="flex items-center justify-end">
            @auth
            <a href="{{ url('/dashboard') }}" class="mx-2">
                <x-button
                    class="border-2 border-collapse bg-blue-400 text-white hover:bg-transparent hover:text-blue-500 hover:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:bg-transparent focus:text-blue-500 active:bg-transparent">
                    Dashboard
                </x-button>
            </a>
            @else
            <a href="{{ route('login') }}" class="text-white" class="mx-2">
                <x-button
                    class="border-2 border-collapse bg-blue-400 text-white hover:bg-transparent hover:text-blue-500 hover:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:bg-transparent focus:text-blue-500 active:bg-transparent">
                    Log in
                </x-button>
            </a>
            @if (Route::has('register'))
            <a href="{{ route('register') }}" class="mx-2">
                <x-button
                    class="border-2 border-collapse bg-green-400 text-white hover:bg-transparent hover:text-green-500 hover:border-green-500 focus:ring-2 focus:ring-green-200 focus:bg-transparent focus:text-green-500 active:bg-transparent">
                    Register
                </x-button>
            </a>
            @endif
            @endauth
        </div>
        @endif
    </div>
    <div class="w-full mx-auto">
        <section class="flex flex-col md:flex-row " style="scroll-behavior: smooth">
            <div class=" w-full xl:w-1/2 rounded-lg bg-white overflow-hidden hidden md:flex">
                <img src="{{ URL('img/welcome.png') }}" alt="" class="w-full h-full rounded-xl">

            </div>
            <div class="w-full xl:w-1/2 mt-10 md:mt-32 flex flex-col">
                <h1 class="text-black text-4xl sm:text-4xl font-bold pl-10">
                    Selamat Datang di Aplikasi SIMONEV Badan Pusat Statistik!
                </h1>

                <p class="text-black px-10 py-10 ">Aplikasi SIMONEV adalah perangkat lunak berbasis web yang Digunakan
                    untuk memonitor setiap kegiatan yang telah dilakukan, dan melakukan evaluasi terhadap masing-masing
                    kegiatan. </p>

                @if (Route::has('login'))

                @auth

                <a href="{{ url('/dashboard') }}">
                    <x-button
                        class="border-2 border-collapse bg-blue-400 text-white hover:bg-transparent hover:text-blue-500 hover:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:bg-transparent focus:text-blue-500 active:bg-transparent mx-10 w-36 h-12 rounded-md">
                        Dashboard
                    </x-button>
                </a>


                @else
                <a href="{{ route('login') }}">
                    <x-button
                        class="border-2 border-collapse bg-blue-400 text-white hover:bg-transparent hover:text-blue-500 hover:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:bg-transparent focus:text-blue-500 active:bg-transparent mx-10 w-36 h-12 rounded-md">
                        Login
                    </x-button>
                </a>

                @endauth

                @endif
                </a>

            </div>

        </section>
    </div>
    </div>
</body>

</html>