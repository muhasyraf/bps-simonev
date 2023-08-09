<x-app-layout>
    <x-slot name="header">
        <h4 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard >> Capaian Kinerja') }}
    </x-slot>

    <div class="pt-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-lg">
                <div class="md:flex md:justify-between">
                    <div class="md:flex md:justify-between">

                    <h1 class="text-black items-center justify-center text-4xl font-extrabold m-5">
                            Capaian Kinerja BPS Pusat Per Triwulan Tahun 2022
                        </h1>
                    <livewire:capkin-import />
                </div>
                    <div class="flex flex-col p-5">
                
                        <select id="yearSelect" onchange="window.onload()"  class="bg-gray-50 border  border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  w-full md:w-40 p-2.5 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected value="2023">2023</option>
                        <option value="2022">2022</option>
                        <option value="2021">2021</option>
                        
                        <option value="2020">2020</option>
                        
                        
                        </select>
                    </div>

                </div>
                <div class="p-2 flex  flex-col md:flex-row">
                    <div class="flex flex-col p-5">
                
                        <label for="chart" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Select view</label>
                        <select id="chart" onchange="window.onload()"  class="bg-gray-50 border  border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  w-full md:w-40 p-2.5 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected value="column">Column</option>
                        <option value="bar">bar</option>
                        <option value="line">line</option>
                        
                        <option value="area">area</option>
                        
                        <option value="scatter">scatter</option>
                        <option value="doughnut">doughnut</option>
            <div class="bg-white shadow-xl sm:rounded-lg">
                <div class="flex justify-between">
                    <h1 class="text-black items-center justify-center text-4xl font-extrabold m-5">
                        Capaian Kinerja BPS Pusat Per Triwulan Tahun 2022
                    </h1>
                    
                </div>
                <div class="p-2 flex  flex-col md:flex-row">
                    <div class="flex flex-col p-5">

                        <label for="chart" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Select
                            view</label>
                        <select id="chart" onchange="window.onload()"
                            class="bg-gray-50 border  border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  w-full md:w-40 p-2.5 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            
                        </select>
                    </div>

                    <div class="flex flex-col p-5">

                        <label for="theme" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Select
                            theme</label>
                        <select id="theme" onchange="window.onload()"
                            class="bg-gray-50 border  border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  w-full md:w-40 p-2.5 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected value="light2">light 1</option>
                            <option value="light1">light 2</option>
                            <option value="dark1">dark 1</option>
                            <option value="dark2">dark 2</option>

                        </select>
                    </div>


                </div>

                <div class="w-11/12  flex flex-col ">

                    <div id="chartContainer" style="height: 450px; " class="pl-10 py-2 inline-block align-top"></div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<div class="bg-gray-100 flex flex-col lg:flex-row my-0  ">

    <div href="#"
        class="block cursor-pointer mx-10 md:mx-32 lg:mx-36 my-5 lg:my-10 md:w-full p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-sky-500 dark:border-gray-700 dark:hover:bg-sky-700">
        <div class="flex flex-row">
            <img src="{{ URL('img/wallet.png') }}" alt="" class="px-6 py-2">
            <div class="flex flex-col">

                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Rp 5.345.234.542</h5>
                <p class="font-bold text-gray-700 dark:text-black">Pagu</p>
            </div>


        </div>
    </div>
    <div href="#"
        class="block cursor-pointer mx-10 md:w-full p-6 md:mx-32 lg:mx-36 my-5 lg:my-10 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-sky-500 dark:border-gray-700 dark:hover:bg-sky-700">
        <div class="flex flex-row">
            <img src="{{ URL('img/wallet.png') }}" alt="" class="px-6 py-2">
            <div class="flex flex-col">

                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Rp 3.543.212.543</h5>
                <p class="font-bold text-gray-700 dark:text-black">Realisasi</p>
            </div>
        </div>

    <script type="text/javascript">
        window.onload = function () {
            var chartType = document.getElementById("chart").value;
            console.log(chartType);

            var themeType = document.getElementById("theme").value;
            var selectedYear = document.getElementById("yearSelect").value;

            var dataCapaian2023 = [
                    { label: "TW1", y: 80 },
                    { label: "TW2", y: 55 },
                    { label: "TW3", y: 40 },
                    { label: "TW4", y: 45 },
                    
                ];
            var dataCapaian2022 = [
                    { label: "TW1", y: 72 },
                    { label: "TW2", y: 83 },
                    { label: "TW3", y: 36 },
                    { label: "TW4", y: 50 },
                    
                ];
            var dataCapaian2021 = [
                    { label: "TW1", y: 55 },
                    { label: "TW2", y: 63 },
                    { label: "TW3", y: 40 },
                    { label: "TW4", y: 35 },
                    
                ];
            var dataCapaian2020 = [
                    { label: "TW1", y: 62 },
                    { label: "TW2", y: 38 },
                    { label: "TW3", y: 45 },
                    { label: "TW4", y: 30 },
                    
                ];
            
            var yearDataCapaian;
            var dataRealisasi2023 = [
                       { label: "TW1", y: 34 },
                       { label: "TW2", y: 42 },
                       { label: "TW3", y: 25 },
                       { label: "TW4", y: 53 },
                       
                   ];
               var dataRealisasi2022 = [
                       { label: "TW1", y: 43 },
                       { label: "TW2", y: 50 },
                       { label: "TW3", y: 32 },
                       { label: "TW4", y: 36 },
                       
                   ];
               var dataRealisasi2021 = [
                       { label: "TW1", y: 33 },
                       { label: "TW2", y: 42 },
                       { label: "TW3", y: 32 },
                       { label: "TW4", y: 34 },
                       
                   ];
               var dataRealisasi2020 = [
                       { label: "TW1", y: 43 },
                       { label: "TW2", y: 28 },
                       { label: "TW3", y: 42 },
                       { label: "TW4", y: 36 },
                       
                   ];
               
               var yearDataRealisasi;

            if (selectedYear === '2021') {
    yearDataCapaian = dataCapaian2021;
    yearDataRealisasi = dataRealisasi2021;
    
  } else if (selectedYear === '2022') {
    yearDataCapaian = dataCapaian2022;
    yearDataRealisasi = dataRealisasi2022;
   
   
  } else if (selectedYear === '2023') {
    yearDataCapaian = dataCapaian2023;
    yearDataRealisasi = dataRealisasi2023;
   
  }  else if (selectedYear === '2020') {
    yearDataCapaian=dataCapaian2020;
    yearDataRealisasi=dataRealisasi2020;
  }


          


        
        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            theme:themeType,
            title:{
                text: ""
            },	
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
                cursor:"pointer",
                itemclick: toggleDataSeries
            },
            data: [{
                type: chartType,
                name: "Capaian Kerja (%)",
                legendText: "Capaian Kerja",
                showInLegend: true, 
                dataPoints: yearDataCapaian
            },
            {
                type: chartType,	
                name: "Realisasi Anggaran (%)",
                legendText: "Realisasi Anggaran",
                
                showInLegend: true,
                dataPoints: yearDataRealisasi
                    
                
            }]
        });
        chart.render();
        
        function toggleDataSeries(e) {
            if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                e.dataSeries.visible = false;
            }
            else {
                e.dataSeries.visible = true;
            }
            chart.render();
        }
        
        }
        
        </script>
    </div>