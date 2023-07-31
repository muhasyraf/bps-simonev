<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

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
        <div class="p-6 flex flex-col  md:flex-row justify-start md:justify-between">
            
            <a href="#" class="flex text-xl text-gray-900 dark:text-black font-bold py-6 px-6">
                <img class="w-10 h-8 mr-2" src="{{ URL('img/logo BPS.png') }}" alt="logo">
                Badan Pusat Statistik
            </a>
            @if (Route::has('login'))
                <div class=" top-0 right-0 p-6 text-right z-10">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="">
                            <button class="border-2 border-collapse bg-blue-400 text-white hover:bg-transparent hover:text-blue-500 hover:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:bg-transparent focus:text-blue-500 active:bg-transparent">

                            </button>
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="text-white">
                            <button class="bg-sky-400 w-20 h-8 rounded-lg">
    
                                Log in
                            </button>
                        </a>
    
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
        

            <div class="max-w-full mx-auto p- ">
                <section class="flex flex-col md:flex-row  " style="scroll-behavior: smooth">
                    <div class=" w-full xl:w-1/2 rounded-lg bg-white overflow-hidden ">
                        
                            

                            <img src="{{ URL('img/welcome.png') }}" alt="" class=" px-10 mt-10 w-full h-full rounded-xl pb-5 ">
                        
        
                    </div>
    
                    <div class="w-full xl:w-1/2    mt-32 flex flex-col">
                        <h1 class="text-black text-4xl sm:text-4xl font-bold pl-10">
                         Selamat Datang di Aplikasi SIMONEV Badan Pusat Statistik!
                        </h1>
        
                        <p class="text-black px-10 py-10 ">Aplikasi SIMONEV adalah perangkat lunak berbasis web yang Digunakan untuk memonitor setiap kegiatan yang telah dilakukan, dan melakukan evaluasi terhadap masing-masing kegiatan. </p>
        
                        @if (Route::has('login'))

                        @auth
                        
                        <a href="{{ url('/dashboard') }}">
                            <x-button>

                                <button class="border-2 border-collapse bg-blue-400 text-white hover:bg-transparent hover:text-blue-500 hover:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:bg-transparent focus:text-blue-500 active:bg-transparent mx-10 w-36 h-12 rounded-md" >Dashboard</button>
                            </x-button>
                        </a>


                        @else
                        <a href="{{ route('login') }}">
                            <x-button>

                                <button class="border-2 border-collapse bg-blue-400 text-white hover:bg-transparent hover:text-blue-500 hover:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:bg-transparent focus:text-blue-500 active:bg-transparent mx-10 w-36 h-12 rounded-md" >Log in</button>
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
