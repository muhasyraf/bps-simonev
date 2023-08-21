<x-app-layout>
    <x-slot name="header">
        <div class="px-2 flex flex-row justify-start items-center font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Entry') }}
            <svg class="w-5 h-5 mx-2 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 12 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m7 9 4-4-4-4M1 9l4-4-4-4" />
            </svg>
            {{ __('Upload FRA') }}
        </div>
    </x-slot>
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <livewire:capaian-kinerja />
            </div>
        </div>
    </div>
</x-app-layout>
