@extends('layouts.main')
@section('container')
    <div class="max-w-full mx-auto">
        <section class="flex flex-col md:flex-row  " style="scroll-behavior: smooth">
            <div class=" hidden lg:flex md:w-full xl:w-1/2 rounded-lg bg-white overflow-hidden ">
                <img src="{{ URL('img/welcome.png') }}" alt="" class="   w-full h-full rounded-xl  ">
            </div>
            <div class="w-full xl:w-1/2  mt-10  md:mt-32 flex flex-col">
                <h1 class="text-black text-4xl sm:text-4xl font-bold pl-10">
                    Selamat Datang di Aplikasi SIMONEV Badan Pusat Statistik!
                </h1>
                <p class="text-black px-10 py-10 ">Aplikasi SIMONEV adalah perangkat lunak berbasis web yang Digunakan untuk
                    memonitor setiap kegiatan yang telah dilakukan, dan melakukan evaluasi terhadap masing-masing kegiatan.
                </p>
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard/PK') }}" class="mx-10 ">
                            <x-button type="button"
                                class="px-5 py-3 text-base font-medium text-center border-2 border-collapse bg-blue-400 text-white hover:bg-transparent hover:text-blue-500 hover:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:bg-transparent focus:text-blue-500 active:bg-transparent w-1/3">
                                Dashboard
                            </x-button>
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="mx-10">
                            <x-button type="button"
                                class="px-5 py-3 text-base font-medium text-center border-2 border-collapse bg-blue-400 text-white hover:bg-transparent hover:text-blue-500 hover:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:bg-transparent focus:text-blue-500 active:bg-transparent w-1/3">
                                Login
                            </x-button>
                        </a>
                    @endauth
                @endif
            </div>
        </section>
        <footer class="bg-white rounded-lg flex md:hidden  mt-56 mx-5 dark:bg-gray-800">
            <div class="w-full mx-auto max-w-full p-6 flex lg:items-center justify-between">
                <span class="text-xs md:text-sm text-black  dark:text-gray-400">© 2023 <a href="./"
                        class="hover:underline">Badan Pusat Statistik.</a>
                </span>

                <p class="text-xs md:text-sm text-black  dark:text-gray-400"> All Rights Reserved.</p>

            </div>
        </footer>

    </div>
@endsection
