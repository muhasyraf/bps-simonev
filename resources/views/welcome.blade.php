@extends('layouts.main')
@section('container')
    <div class="max-w-full mx-auto p- ">
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
                        <a href="{{ url('/dashboard/PK') }}">
                            <x-button>
                                <button
                                    class="border-2 border-collapse bg-blue-400 text-white hover:bg-transparent hover:text-blue-500 hover:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:bg-transparent focus:text-blue-500 active:bg-transparent mx-10 w-36 h-12 rounded-md">Dashboard</button>
                            </x-button>
                        </a>
                    @else
                        <a href="{{ route('login') }}">
                            <x-button>
                                <button
                                    class="border-2 border-collapse bg-blue-400 text-white hover:bg-transparent hover:text-blue-500 hover:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:bg-transparent focus:text-blue-500 active:bg-transparent mx-10 w-36 h-12 rounded-md">Log
                                    in</button>
                            </x-button>
                        </a>
                    @endauth
                @endif
            </div>
        </section>
    </div>
@endsection
