@extends('layouts.main')
@section('container')
    <div class="p-5">
        <section class="bg-gray-300 rounded-lg">
            <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16">
                <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl lg:text-6xl text-black">
                    Lorem ipsum dolor sit amet.</h1>
                <p class="mb-8 text-lg font-normal lg:text-xl sm:px-16 lg:px-48 text-black">Here at
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vitae, inventore numquam corporis doloribus
                    est porro.</p>
                <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4">
                    <a href="#"
                        class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-900">
                        More Information
                        <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </a>
                </div>
            </div>
        </section>
    </div>
@endsection
