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
        
         @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased">
        <div class="p-6 flex flex-col  md:flex-row justify-start md:justify-between">
            
            <img src="{{asset('img/SIMonev.png')}}" alt="" width="180px" class="">

            @if (Route::has('login'))
                <div class=" top-0 right-0 p-6 text-right z-10">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
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
        

            <div class="max-w-full mx-auto p- lg:p-8">
                <section class="flex flex-col md:flex-row p-5 md:mx-10" style="scroll-behavior: smooth">
    
                    <div class="w-full xl:w-1/2    mt-32 flex flex-col">
                        <h1 class="text-black text-4xl sm:text-3xl font-bold pl-10">
                         Selamat Datang di Aplikasi SIMONEV Badan Pusat Statistik!
                        </h1>
        
                        <p class="text-black px-10 py-10 ">Aplikasi SIMONEV adalah perangkat lunak berbasis web yang Digunakan untuk memonitor setiap kegiatan yang telah dilakukan, dan melakukan evaluasi terhadap masing-masing kegiatan. </p>
        
                        <a href="#hero" class="w-full md:w-32 pl-10">
        
                            <button class="border-2 border-collapse bg-blue-400 text-white hover:bg-transparent hover:text-blue-500 hover:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:bg-transparent focus:text-blue-500 active:bg-transparent w-32 h-12">
                                Learn More
                            </button>
                        </a>
        
        
        
                    </div>
        
                    <div class=" w-full xl:w-1/2 rounded-lg bg-white overflow-hidden ">
                        
                            

                            <img src="{{ URL('img/web.jpg') }}" alt="" class=" px-10 mt-10 w-full h-full rounded-xl pb-5 ">
                        
        
                    </div>
                </section>
        
                <section id="hero" style="scroll-behavior: smooth">
                    <div  class=" bg-white rounded-3xl md:mx-12 mt-32 md:h-96 flex flex-col md:flex-row" >
                        <div class="w-full xl:w-1/2">
                            <img src="{{ URL('img/graph.png') }}" alt="" class="w-full items-center h-full">
        
                        </div>
                        <div class="w-full xl:w-1/2">
                            <h2 class="text-black font-bold text-3xl  items-center justify-center px-10 py-20">
                                Visualisasi data menggunakan grafik memungkinkan pengguna untuk dapat melihat hasil analisis dari input data secara real-time.
        
                            </h2>
                            @if (Route::has('login'))

                                @auth
                                
                                <a href="{{ url('/dashboard') }}">

                                <button class="border-2 border-collapse bg-blue-400 text-white hover:bg-transparent hover:text-blue-500 hover:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:bg-transparent focus:text-blue-500 active:bg-transparent mx-10 w-36 h-12" >Dashboard</button>
                                </a>

                                @else
                                <a href="{{ route('login') }}">

                                    <button class="border-2 border-collapse bg-blue-400 text-white hover:bg-transparent hover:text-blue-500 hover:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:bg-transparent focus:text-blue-500 active:bg-transparent mx-10 w-36 h-12" >Log in</button>
                                    </a>

                            @endauth

                            @endif

        
                        </div>
        
        
                    </div>
        
                
                </section>
                

                <div class="flex justify-center mt-16 px-0 sm:items-center sm:justify-between">
                    <div class="text-center text-sm text-gray-500 sm:text-left">
                        <div class="flex items-center gap-4">
                            <a href="https://github.com/sponsors/taylorotwell" class="group inline-flex items-center hover:text-gray-700 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="-mt-px mr-1 w-5 h-5 stroke-gray-400 group-hover:stroke-gray-600">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                </svg>
                                Sponsor
                            </a>
                        </div>
                    </div>

                    <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
