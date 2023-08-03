<x-app-layout>
    <x-slot name="header">
        <h4 class="font-semibold text-xl text-gray-800 leading-tight justify-between">
            {{ __('Dashboard >> PK') }}
            

            
    </x-slot>

    <div class="pt-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden  shadow-xl sm:rounded-lg">
                <h1 class="text-black items-center justify-center text-4xl font-extrabold m-5">
                    Grafik absensi pemasukan dokumen PK
                </h1>
                <div class="p-2 flex  flex-col md:flex-row">
                    <div class="flex flex-col p-5">
                
                        <label for="chart" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Select view</label>
                        <select id="chart" onchange="window.onload()"  class="bg-gray-50 border  border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  w-full md:w-40 p-2.5 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected value="column">Column</option>
                        <option value="bar">bar</option>
                        <option value="line">line</option>
                        <option value="pie">pie</option>
                        <option value="area">area</option>
                        <option value="pyramid">pyramid</option>
                        <option value="funnel">funnel</option>
                        <option value="scatter">scatter</option>
                        <option value="doughnut">doughnut</option>
                        <option value="spline">spline</option>
                        </select>
                    </div>
                
                    <div class="flex flex-col p-5">
                
                        <label for="theme" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Select theme</label>
                        <select id="theme" onchange="window.onload()"  class="bg-gray-50 border  border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  w-full md:w-40 p-2.5 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected value="light1">light 1</option>
                        <option value="light2">light 2</option>
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

    <div href="#" class="block mx-10 cursor-pointer md:mx-32 lg:mx-36 my-5 lg:my-10 max-w-md p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-sky-500 dark:border-gray-700 dark:hover:bg-sky-700">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy technology acquisitions 2021</h5>
        <p class="font-bold text-gray-700 dark:text-black">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
    </div>
    <div href="#" class="block mx-10 cursor-pointer max-w-md p-6 md:mx-32 lg:mx-36 my-5 lg:my-10 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-sky-500 dark:border-gray-700 dark:hover:bg-sky-700">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy technology acquisitions 2021</h5>
        <p class="font-bold text-gray-700 dark:text-black">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
    </div>

    <script type="text/javascript">
        window.onload = function () {
            var chartType = document.getElementById("chart").value;
            console.log(chartType);

            var themeType = document.getElementById("theme").value;
        
        
        var chart = new CanvasJS.Chart("chartContainer", {
            theme: themeType, // "light2", "dark1", "dark2"
            animationEnabled: true, // change to true		
            title:{
                text: ""
            },
            data: [
            {
                // Change type to "bar", "area", "spline", "pie",etc.
                type: chartType,
                dataPoints: [
                    { label: "Januari",  y: 10  },
                    { label: "Februari", y: 15  },
                    { label: "Maret", y: 25  },
                    { label: "April",  y: 30  },
                    { label: "Mei",  y: 28  },
                    { label: "Juni",  y: 32  },
                    { label: "Juli",  y: 43  },
                    { label: "Agustus",  y: 24  },
                    { label: "September",  y: 30  },
                    { label: "Oktober",  y: 18  },
                    { label: "November",  y: 32  },
                    { label: "Desember",  y: 40  },
                ]
            }
            ]
        });
        chart.render();
        
        }
        </script>
</div>