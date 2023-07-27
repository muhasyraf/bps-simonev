<x-app-layout>
    <x-slot name="header">
        <h4 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard >> PK') }}
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <h1 class="text-black items-center justify-center text-4xl font-extrabold m-5">
                    Grafik absensi pemasukan dokumen PK
                </h1>
                <div class="p-2 flex  flex-col md:flex-row">
                    <div class="flex flex-col p-5">
                
                        <label for="chart" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select view</label>
                        <select id="chart" onchange="window.onload()"  class="bg-gray-50 border  border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  w-full md:w-40 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
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
                
                        <label for="theme" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select theme</label>
                        <select id="theme" onchange="window.onload()"  class="bg-gray-50 border  border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  w-full md:w-40 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
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