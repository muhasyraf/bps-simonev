<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased">
    <x-banner />

    <div class="min-h-screen bg-gray-100">
        @livewire('navigation-menu')

        <!-- Page Heading -->
        @if (isset($header))
        <header class="bg-gray-100">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
    @stack('modals')
    @livewireScripts
    <script src="https://cdn.canvasjs.com/canvasjs.min.js" defer></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <x-livewire-alert::scripts />

</body>
<script>
    window.onload = function () {
            
            var chartType = document.getElementById("chart").value;
            console.log(chartType);

            var themeType = document.getElementById("theme").value;
    
                    var chart = new CanvasJS.Chart("chartContainer", {
                        animationEnabled: true,
                        exportEnabled: true,
                        theme:themeType, 
                        title:{
                            text: ""
                        },
                        axisY: {
                        includeZero: true
                        },
                        data: [{
                            type:chartType, 
                            
                            indexLabelFontColor: "#5A5757",
                            indexLabelFontSize: 16,
                            indexLabelPlacement: "outside",
                            dataPoints: [
                                { x: 10, y: 75, },
                                { x: 20, y: 55 },
                                { x: 30, y: 50 },
                                { x: 40, y: 65 },
                                { x: 50, y: 92, indexLabel: "\u2605 Highest" },
                                { x: 60, y: 68 },
                                
                                { x: 70, y: 38 },
                                { x: 75, y: 48},
                                { x: 80, y: 71 },
                                { x: 90, y: 54 },
                                { x: 100, y: 60 },
                                { x: 110, y: 36 },
                                { x: 120, y: 49 },
                                { x: 130, y: 21, indexLabel: "\u2691 Lowest" }
                            ]
                        }]
                    });
                    chart.render();
                    
                    }

</script>

</html>