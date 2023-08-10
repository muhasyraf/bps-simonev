<x-app-layout>
    <x-slot name="header">
        <h4 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard >> Capaian Kinerja') }}
    </x-slot>
    <div class="pt-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-lg">
                <div class="p-2 flex flex-col md:flex-row justify-between">
                    <div class="flex fle-col p-5">
                        <h1 class="text-black items-center justify-center text-4xl font-extrabold">
                            Capaian Kinerja & Realisasi Anggaran
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
                                <option disabled hidden selected value=2023>Tahun 2023</option>
                                @foreach ($excelData as $item)
                                    <option value="{{ 2024 - $item->id }}">Tahun {{ 2024 - $item->id }}</option>
                                @endforeach
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
<div class="bg-gray-100 flex flex-col md:flex-row justify-between p-5 sm:px-6 lg:px-8">
    <div
        class="flex flex-row justify-center block cursor-pointer p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-sky-500 dark:border-gray-700 dark:hover:bg-sky-700 my-5">
        <img src="{{ URL('img/wallet.png') }}" alt="" class="px-6 py-2">
        <div class="flex flex-col">
            <div class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white flex flex-row">
                <h5 id="avg2"></h5>
                <h5>%</h5>
            </div>
            <p class="font-bold text-gray-700 dark:text-black">Rata-Rata Capaian Kinerja/Tahun</p>
        </div>
    </div>
    <div
        class="flex flex-row justify-center block cursor-pointer p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-sky-500 dark:border-gray-700 dark:hover:bg-sky-700 my-5">
        <img src="{{ URL('img/wallet.png') }}" alt="" class="px-6 py-2">
        <div class="flex flex-col">
            <div class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white flex flex-row">
                <h5 id="avg"></h5>
                <h5>%</h5>
            </div>
            <p class="font-bold text-gray-700 dark:text-black">Rata-Rata Realisasi Anggaran/Tahun</p>
        </div>
    </div>

</div>
<script>
    window.onload = function() {
        var chartType = document.getElementById("chart").value;
        console.log(chartType);

        var themeType = document.getElementById("theme").value;

        var selectedYear = document.getElementById("yearSelect").value;
        var yearDataCapkin = [];
        var yearDataRA = [];

        if (selectedYear == 2023) {
            yearDataCapkin[selectedYear] = [
                @foreach ($newDataCapkin[1] as $keyDatC => $valDatC)
                    {
                        label: <?= "\"" . $keyDatC . "\"" ?>,
                        y: <?= $valDatC ?>
                    },
                @endforeach
            ];
            yearDataRA[selectedYear] = [
                @foreach ($newDataRA[1] as $keyDatC => $valDatC)
                    {
                        label: <?= "\"" . $keyDatC . "\"" ?>,
                        y: <?= $valDatC ?>
                    },
                @endforeach
            ];
        } else if (selectedYear == 2022) {
            yearDataCapkin[selectedYear] = [
                @foreach ($newDataCapkin[2] as $keyDatC => $valDatC)
                    {
                        label: <?= "\"" . $keyDatC . "\"" ?>,
                        y: <?= $valDatC ?>
                    },
                @endforeach
            ];
            yearDataRA[selectedYear] = [
                @foreach ($newDataRA[2] as $keyDatC => $valDatC)
                    {
                        label: <?= "\"" . $keyDatC . "\"" ?>,
                        y: <?= $valDatC ?>
                    },
                @endforeach
            ];
        } else if (selectedYear == 2021) {
            yearDataCapkin[selectedYear] = [
                @foreach ($newDataCapkin[3] as $keyDatC => $valDatC)
                    {
                        label: <?= "\"" . $keyDatC . "\"" ?>,
                        y: <?= $valDatC ?>
                    },
                @endforeach
            ];
            yearDataRA[selectedYear] = [
                @foreach ($newDataRA[3] as $keyDatC => $valDatC)
                    {
                        label: <?= "\"" . $keyDatC . "\"" ?>,
                        y: <?= $valDatC ?>
                    },
                @endforeach
            ];
        }


        console.log(yearDataCapkin);
        console.log(yearDataRA);

        const totalY = yearDataRA[selectedYear].reduce((total, data) => total + data.y, 0);
        const avgY = totalY / yearDataRA[selectedYear].length;
        document.getElementById("avg").innerText = avgY;

        const totalCapaian = yearDataCapkin[selectedYear].reduce((total, data) => total + data.y, 0);
        const avgY2 = totalCapaian / yearDataCapkin[selectedYear].length;
        document.getElementById("avg2").innerText = avgY2;

        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            theme: themeType,
            axisY: {
                title: "Persentase",
                titleFontColor: "#4F81BC",
                lineColor: "#4F81BC",
                labelFontColor: "#4F81BC",
                tickColor: "#4F81BC"
            },

            toolTip: {
                shared: true
            },
            legend: {
                cursor: "pointer",
                itemclick: toggleDataSeries
            },
            data: [{
                    type: chartType,
                    name: "Capaian Kinerja (%)",
                    legendText: "Capaian Kinerja",
                    showInLegend: true,
                    dataPoints: yearDataCapkin[selectedYear]
                },
                {
                    type: chartType,
                    name: "Realisasi Anggaran (%)",
                    legendText: "Realisasi Anggaran",
                    showInLegend: true,
                    dataPoints: yearDataRA[selectedYear]
                }
            ]
        });
        chart.render();

        function toggleDataSeries(e) {
            if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                e.dataSeries.visible = false;
            } else {
                e.dataSeries.visible = true;
            }
            chart.render();
        }
    }
</script>
