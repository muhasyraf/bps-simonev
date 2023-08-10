<x-app-layout>
    <x-slot name="header">
        <h4 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
    </x-slot>

    <div class="pt-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <h1 class="text-black items-center justify-center text-4xl font-extrabold m-5">
                    INFORMATION
                </h1>
                <div class="p-2 flex  flex-col md:flex-row">
                    <div class="flex flex-col p-5">

                        <label for="chart" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Select
                            view</label>
                        <select id="chart" onchange="window.onload()"
                            class="bg-gray-50 border  border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  w-full md:w-40 p-2.5 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected value="column">Column</option>
                            <option value="bar">bar</option>
                            <option value="line">line</option>
                            <option value="pie">pie</option>
                            <option value="area">area</option>
                            <option value="pyramid">pyramid</option>
                            <option value="funnel">funnel</option>
                            <option value="scatter">scatter</option>
                        </select>
                    </div>

                    <div class="flex flex-col p-5">

                        <label for="theme"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Select theme</label>
                        <select id="theme" onchange="window.onload()"
                            class="bg-gray-50 border  border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  w-full md:w-40 p-2.5 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected value="light1">light 1</option>
                            <option value="light2">light 2</option>
                            <option value="dark1">dark 1</option>
                            <option value="dark2">dark 2</option>

                        </select>
                    </div>


                </div>

                <div class="w-10/12  flex flex-col ">

                    <div id="chartContainer" style="height: 450px; " class="pl-10 py-2 inline-block align-top"></div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<div class="bg-gray-100 flex flex-col lg:flex-row my-0  ">

    <div href="#"
        class="block mx-10 cursor-pointer  md:mx-32 lg:mx-36 my-5 lg:my-10 max-w-md p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-sky-500 dark:border-gray-700 dark:hover:bg-sky-700">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy technology
            acquisitions 2021</h5>
        <p class="font-bold text-gray-700 dark:text-black">Here are the biggest enterprise technology acquisitions of
            2021 so far, in reverse chronological order.</p>
    </div>
    <div href="#"
        class="block mx-10 cursor-pointer max-w-md p-6 md:mx-32 lg:mx-36 my-5 lg:my-10 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-sky-500 dark:border-gray-700 dark:hover:bg-sky-700">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy technology
            acquisitions 2021</h5>
        <p class="font-bold text-gray-700 dark:text-black">Here are the biggest enterprise technology acquisitions of
            2021 so far, in reverse chronological order.</p>
    </div>


    <script>
        window.onload = function() {

            var chartType = document.getElementById("chart").value;
            console.log(chartType);

            var themeType = document.getElementById("theme").value;

            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                exportEnabled: true,
                theme: themeType,
                title: {
                    text: ""
                },
                axisY: {
                    includeZero: true
                },
                data: [{
                    type: chartType,

                    indexLabelFontColor: "#5A5757",
                    indexLabelFontSize: 16,
                    indexLabelPlacement: "outside",
                    dataPoints: [{
                            x: 10,
                            y: 75,
                        },
                        {
                            x: 20,
                            y: 55
                        },
                        {
                            x: 30,
                            y: 50
                        },
                        {
                            x: 40,
                            y: 65
                        },
                        {
                            x: 50,
                            y: 92,
                            indexLabel: "\u2605 Highest"
                        },
                        {
                            x: 60,
                            y: 68
                        },

                        {
                            x: 70,
                            y: 38
                        },
                        {
                            x: 75,
                            y: 48
                        },
                        {
                            x: 80,
                            y: 71
                        },
                        {
                            x: 90,
                            y: 54
                        },
                        {
                            x: 100,
                            y: 60
                        },
                        {
                            x: 110,
                            y: 36
                        },
                        {
                            x: 120,
                            y: 49
                        },
                        {
                            x: 130,
                            y: 21,
                            indexLabel: "\u2691 Lowest"
                        }
                    ]
                }]
            });
            chart.render();

        }
    </script>
</div>
