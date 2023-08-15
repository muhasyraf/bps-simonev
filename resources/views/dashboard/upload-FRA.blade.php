<x-app-layout>
    <x-slot name="header">
        <h4 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard >> Upload FRA') }}

    </x-slot>


    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-2 flex flex-col md:flex-row justify-between">
                    <div class="flex fle-col p-5">
                        <h1 class="text-black items-center justify-center text-4xl font-extrabold">
                            Grafik Pemasukan Dokumen FRA
                        </h1>
                    </div>
                    <div class="p-2 flex flex-row justify-center items-center">
                        <div class="flex flex-col p-5">
                            {{-- <label for="chart"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Select
                                view</label> --}}
                            <select id="chart" onchange="window.onload()"
                                class="bg-gray-50 border  border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  w-full p-2.5 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option disabled hidden selected value="column">Chart Type</option>
                                <option value="column">Column</option>
                                <option value="bar">bar</option>
                                <option value="line">line</option>
                                <option value="area">area</option>
                                <option value="scatter">scatter</option>
                            </select>
                        </div>
                        <div class="flex flex-col p-5">
                            {{-- <label for="theme"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Select
                                theme</label> --}}
                            <select id="theme" onchange="window.onload()"
                                class="bg-gray-50 border  border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  w-full p-2.5 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option hidden disabled selected value="light2">Tema</option>
                                <option value="light2">light 1</option>
                                <option value="light1">light 2</option>
                                <option value="dark1">dark 1</option>
                                <option value="dark2">dark 2</option>
                            </select>
                        </div>
                        <div class="flex flex-col p-5">
                            {{-- <label for="tahun"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Pilih
                                Tahun</label> --}}
                            <select id="yearSelect" onchange="window.onload()"
                                class="bg-gray-50 border  border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  w-full p-2.5 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected value=2023>Tahun 2023</option>
                                <option value="2022">Tahun 2022</option>
                                <option value="2021">Tahun 2021</option>
                                <option value="2020">Tahun 2020</option>
                                <option value="2019">Tahun 2019</option>
                                <option value="2018">Tahun 2018</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="w-11/12 flex flex-col justify-center">
                    <div id="chartContainer" style="height: 450px; " class="pl-10 py-2 inline-block align-top"></div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<div class="bg-gray-100 flex flex-col md:flex-row justify-between items-center p-5 sm:px-6 lg:px-8 w-full">
    <div
        class="flex flex-row justify-center block cursor-pointer p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-sky-500 dark:border-gray-700 dark:hover:bg-sky-700 my-5 w-full md:w-1/3">
        <img src="{{ URL('img/wallet.png') }}" alt="" class="px-6 py-2">
        <div class="flex flex-col">
            <div class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white flex flex-row">
                <h5 id="avg"></h5>
            </div>
            <p class="font-bold text-gray-700 dark:text-black">Rata-Rata File/Bulan</p>
        </div>
    </div>
    <div
        class="flex flex-row justify-center block cursor-pointer p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-sky-500 dark:border-gray-700 dark:hover:bg-sky-700 my-5 w-full md:w-1/3">
        <img src="{{ URL('img/wallet.png') }}" alt="" class="px-6 py-2">
        <div class="flex flex-col">
            <div class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white flex flex-row">
                <h5 id="total"></h5>
            </div>
            <p class="font-bold text-gray-700 dark:text-black">Total FIle</p>
        </div>
    </div>
</div>
<script>
    window.onload = function() {

        var chartType = document.getElementById("chart").value;
        console.log(chartType);

        var themeType = document.getElementById("theme").value;

        var selectedYear = document.getElementById("yearSelect").value;

        var data2023 = [{
                label: "Januari",
                y: 10
            },
            {
                label: "Februari",
                y: 15
            },
            {
                label: "Maret",
                y: 25
            },
            {
                label: "April",
                y: 30
            },
            {
                label: "Mei",
                y: 28
            },
            {
                label: "Juni",
                y: 32
            },
            {
                label: "Juli",
                y: 43
            },
            {
                label: "Agustus",
                y: 24
            },
            {
                label: "September",
                y: 30
            },
            {
                label: "Oktober",
                y: 18
            },
            {
                label: "November",
                y: 32
            },
            {
                label: "Desember",
                y: 40
            },
        ];

        var data2022 = [{
                label: "Januari",
                y: 25
            },
            {
                label: "Februari",
                y: 41
            },
            {
                label: "Maret",
                y: 35
            },
            {
                label: "April",
                y: 25
            },
            {
                label: "Mei",
                y: 30
            },
            {
                label: "Juni",
                y: 21
            },
            {
                label: "Juli",
                y: 28
            },
            {
                label: "Agustus",
                y: 32
            },
            {
                label: "September",
                y: 24
            },
            {
                label: "Oktober",
                y: 22
            },
            {
                label: "November",
                y: 26
            },
            {
                label: "Desember",
                y: 42
            },
        ];

        var data2021 = [{
                label: "Januari",
                y: 15
            },
            {
                label: "Februari",
                y: 20
            },
            {
                label: "Maret",
                y: 28
            },
            {
                label: "April",
                y: 35
            },
            {
                label: "Mei",
                y: 22
            },
            {
                label: "Juni",
                y: 40
            },
            {
                label: "Juli",
                y: 38
            },
            {
                label: "Agustus",
                y: 30
            },
            {
                label: "September",
                y: 25
            },
            {
                label: "Oktober",
                y: 18
            },
            {
                label: "November",
                y: 35
            },
            {
                label: "Desember",
                y: 30
            },
        ];

        var data2020 = [{
                label: "Januari",
                y: 24
            },
            {
                label: "Februari",
                y: 32
            },
            {
                label: "Maret",
                y: 12
            },
            {
                label: "April",
                y: 42
            },
            {
                label: "Mei",
                y: 42
            },
            {
                label: "Juni",
                y: 31
            },
            {
                label: "Juli",
                y: 45
            },
            {
                label: "Agustus",
                y: 22
            },
            {
                label: "September",
                y: 27
            },
            {
                label: "Oktober",
                y: 42
            },
            {
                label: "November",
                y: 22
            },
            {
                label: "Desember",
                y: 18
            },
        ];

        var data2019 = [{
                label: "Januari",
                y: 12
            },
            {
                label: "Februari",
                y: 17
            },
            {
                label: "Maret",
                y: 30
            },
            {
                label: "April",
                y: 40
            },
            {
                label: "Mei",
                y: 34
            },
            {
                label: "Juni",
                y: 42
            },
            {
                label: "Juli",
                y: 35
            },
            {
                label: "Agustus",
                y: 25
            },
            {
                label: "September",
                y: 14
            },
            {
                label: "Oktober",
                y: 18
            },
            {
                label: "November",
                y: 25
            },
            {
                label: "Desember",
                y: 38
            },
        ];

        var data2018 = [{
                label: "Januari",
                y: 37
            },
            {
                label: "Februari",
                y: 18
            },
            {
                label: "Maret",
                y: 29
            },
            {
                label: "April",
                y: 23
            },
            {
                label: "Mei",
                y: 38
            },
            {
                label: "Juni",
                y: 24
            },
            {
                label: "Juli",
                y: 48
            },
            {
                label: "Agustus",
                y: 52
            },
            {
                label: "September",
                y: 37
            },
            {
                label: "Oktober",
                y: 24
            },
            {
                label: "November",
                y: 38
            },
            {
                label: "Desember",
                y: 25
            },
        ];
        var yearData;

        if (selectedYear === '2021') {
            yearData = data2021;

        } else if (selectedYear === '2022') {
            yearData = data2022;

        } else if (selectedYear === '2023') {
            yearData = data2023;

        } else if (selectedYear === '2019') {
            yearData = data2019;
        } else if (selectedYear === '2018') {
            yearData = data2018;
        } else if (selectedYear === '2020') {
            yearData = data2020;
        }

        const totalY = yearData.reduce((total, data) => total + data.y, 0);
        document.getElementById("total").innerHTML = totalY;

        const avgY = totalY / yearData.length;
        document.getElementById("avg").innerHTML = avgY.toFixed(2);


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
                dataPoints: yearData
            }]
        });
        chart.render();

    }
</script>
</div>
