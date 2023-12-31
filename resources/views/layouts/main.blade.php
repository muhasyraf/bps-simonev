<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
    <div class="pt-2 flex flex-col  md:flex-row justify-center md:justify-between">
        <a href="./" class="flex text-xl text-gray-900 dark:text-black font-bold py-6 px-6">
            <img class="w-10 h-8 mr-2" src="{{ URL('img/logo BPS.png') }}" alt="logo">
            Badan Pusat Statistik
        </a>
        <a class="flex justify-end md:hidden ml-72 sm:ml-96 -mt-14 text-lg" onclick="myFunction()">
            <i class="fa fa-bars"></i>
        </a>
        <div class="relative justify-center hidden md:flex flex-col md:flex-row font-bold " id="nav">
            <a href="./about" class="m-6">About</a>
            <a href="./information" class="m-6">Information</a>
            <a href="./terms" class="m-6">Terms</a>
        </div>
    </div>
    @yield('container')
    <script>
        function myFunction() {
            var menu = document.getElementById('nav');
            console.log('click');
            if (menu.style.display === "flex") {
                menu.style.display = "none";
            } else {
                menu.style.display = "flex";
            }
        }
    </script>
    </div>
</body>

</html>
