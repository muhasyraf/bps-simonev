@extends('layouts.main')
@section('container')
    <div>

        <section class="flex flex-col md:flex-row md:p-5" style="scroll-behavior: smooth">

            <div class="w-full xl:w-1/2   px-10 md:mx-10 mt-32 flex flex-col">
                <h1 class="text-black text-2xl sm:text-3xl font-bold pl-10">
                    Sistem Monitoring dan Evaluasi (SIMONEV) Badan Pusat Statistik merupakan sistem terintegrasi untuk
                    melakukan monitoring terhadap seluruh aktifitas dan kegiatan.
                </h1>

                <p class="text-black px-10 py-10 ">SIMONEV memungkinakan Badan Pusat Statistik untuk memantau perkembangan
                    kinerja, mengidentifikasi permasalahan, dan merencanakan langkah-langkah perbaikan secara lebih efektif.
                </p>

                <a href="#hero" class="w-full md:w-32 px-10">

                    <button
                        class="border-2 border-collapse rounded-md bg-blue-400 w-32 h-12 text-white hover:bg-transparent hover:text-blue-500 hover:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:bg-transparent focus:text-blue-500 active:bg-transparent">
                        Learn More
                    </button>
                </a>



            </div>

            <div class=" w-full xl:w-1/2">
                <img src="{{ URL('img/web3.png') }}" alt="" class=" px-10 mt-10 w-full h-full rounded-xl pb-5">

            </div>
        </section>

        <section id="hero" style="scroll-behavior: smooth" class="mb-10">
            <div class=" bg-white rounded-3xl mx-12 mt-32 md:h-96 flex flex-col md:flex-row">
                <div class="w-full xl:w-1/2">
                    <img src="{{ URL('img/graph.png') }}" alt="" class="w-full items-center h-full">

                </div>
                <div class="w-full xl:w-1/2">
                    <h2 class="text-black font-bold text-3xl items-center justify-center px-10 pt-10 pb-8">
                        Visualisasi data menggunakan grafik memungkinkan pengguna untuk dapat melihat akumulasi dan hasil
                        analisis data secara real-time.
                    </h2>
                    <p class="text-black px-10 py-2 ">Pengguna dapat melihat akumulasi dari capaian kinerja, realisasi
                        anggaran, dan frekuensi upload file FRA secara lebih ringkas dan interaktif. </p>
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard/PK') }}">
                                <x-button>
                                    <button
                                        class="border-2 border-collapse bg-blue-400 text-white hover:bg-transparent hover:text-blue-500 hover:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:bg-transparent focus:text-blue-500 active:bg-transparent mx-10 w-36 h-12 rounded-md">Dashboard</button>
                                </x-button>
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="px-10">
                                <x-button>
                                    <button
                                        class="border-2 border-collapse bg-blue-400 text-white hover:bg-transparent hover:text-blue-500 hover:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:bg-transparent focus:text-blue-500 active:bg-transparent mx-10 w-36 h-12 rounded-md">Log
                                        in</button>
                                </x-button>
                            </a>
                        @endauth
                    @endif

                </div>

            </div>


        </section>


        <footer class="bg-white rounded-lg   mt-12 mx-5 dark:bg-gray-800">
            <div class="w-full mx-auto max-w-full p-6 flex lg:items-center justify-between">
                <span class="text-xs md:text-sm text-black  dark:text-gray-400">© 2023 <a href="./"
                        class="hover:underline">Badan Pusat Statistik.</a>
                </span>

                <p class="text-xs md:text-sm text-black  dark:text-gray-400"> All Rights Reserved.</p>

            </div>
        </footer>


    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.0/flowbite.min.js"></script>
@endsection
