<div class="p-6 lg:p-8 bg-white border-b border-gray-200">
    <div class="mt-2 flex items-center justify-end">
        <div class="relative mx-1 w-1/4">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
            </div>
            <input type="search" wire:model="q" id="default-search"
                class="block w-full px-4 py-3 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Cari pusat / tahun ..." required>
        </div>
        <div class="mx-1">
            <x-button type="button"
                class="px-5 py-3 text-base font-medium text-center border-2 border-collapse bg-green-400 text-white hover:bg-transparent hover:text-green-500 hover:border-green-500 focus:ring-2 focus:ring-green-200 focus:bg-transparent focus:text-green-500 active:bg-transparent"
                wire:click="confirmItemAdd">
                Input Data
            </x-button>
        </div>
    </div>
    <div class="mt-6 flex lg:justify-center overflow-x-auto md:justify-start shadow-md sm:rounded-lg">
        <table class="table-auto w-full">
            <thead>
                <tr class="border-4 border-slate-400">
                    <th class="bg-slate-200 px-2 py-2 w-24">
                        <button wire:click="sortBy('id')">
                            <div class="flex items-center justify-center">
                                ID
                                <x-sort-icon sortField="id" :sort-by="$sortBy" :sort-asc="$sortAsc" />
                            </div>
                        </button>
                    </th>
                    <th class="bg-transparent px-2 py-2 w-64">
                        <button wire:click="sortBy('name')">
                            <div class="flex items-center justify-center">
                                Pusat
                                <x-sort-icon sortField="name" :sort-by="$sortBy" :sort-asc="$sortAsc" />
                            </div>
                        </button>
                    </th>
                    <th class="bg-slate-200 px-2 py-2 w-56">
                        <button wire:click="sortBy('tanggal')">
                            <div class="flex items-center justify-center">Tanggal
                                <x-sort-icon sortField="tanggal" :sort-by="$sortBy" :sort-asc="$sortAsc" />
                            </div>
                        </button>
                    </th>
                    <th class="bg-transparent px-2 py-2 w-28">
                        <button wire:click="sortBy('tahun')">
                            <div class="flex items-center justify-center">Tahun
                                <x-sort-icon sortField="tahun" :sort-by="$sortBy" :sort-asc="$sortAsc" />
                            </div>
                        </button>
                    </th>
                    <th class="bg-slate-200 px-2 py-2 w-28">
                        <button wire:click="sortBy('triwulan')">
                            <div class="flex items-center justify-center">Triwulan
                                <x-sort-icon sortField="triwulan" :sort-by="$sortBy" :sort-asc="$sortAsc" />
                            </div>
                        </button>
                    </th>
                    <th class="bg-transparent px-2 py-2 w-auto">
                        <div class="flex justify-center">Action</div>
                    </th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($capkins as $capkin)
                <tr class="border-x-4 border-t-2 border-slate-400">
                    <td class="bg-slate-200 px-2 py-2">
                        <div class="flex justify-center">
                            {{$capkin->id}}
                        </div>
                    </td>
                    <td class="bg-transparent px-2 py-2">{{$capkin->pusat->name}}</td>
                    <td class="bg-slate-200 px-2 py-2">{{date_format(date_create($capkin->tanggal),"d M Y")}}</td>
                    <td class="bg-transparent px-2 py-2">
                        {{$capkin->tahun}}
                    </td>
                    <td class="bg-slate-200 px-2 py-2 w-auto">
                        <div class="flex justify-center">
                            {{$capkin->triwulan}}
                        </div>
                    </td>
                    {{-- <td class=" px-2 py-2">{{$capkin->file}}</td> --}}
                    <td class="bg-transparent px-2 py-2 text-xs w-auto">
                        <div class="flex justify-center">
                            <x-button type="button"
                                class="border-2 border-collapse bg-blue-400 text-white hover:bg-transparent hover:text-blue-500 hover:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:bg-transparent focus:text-blue-500 active:bg-transparent"
                                wire:click="download('{{$capkin->file}}')">
                                Download
                            </x-button>
                            <x-button type="button"
                                class="ml-2 border-2 border-collapse bg-yellow-400 text-white hover:bg-transparent hover:text-yellow-500 hover:border-yellow-500 focus:ring-2 focus:ring-yellow-200 focus:bg-transparent focus:text-yellow-500 active:bg-transparent"
                                wire:click="confirmItemEdit({{$capkin}})">
                                Edit
                            </x-button>
                            <x-button type="button"
                                class="ml-2 border-2 border-collapse bg-red-400 text-white hover:bg-transparent hover:text-red-500 hover:border-red-500 focus:ring-2 focus:ring-red-200 focus:bg-transparent focus:text-red-500 active:bg-transparent"
                                wire:click="confirmItemDelete({{$capkin->id}})">
                                Delete
                            </x-button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-2">
        {{$capkins->links()}}
    </div>
    <x-dialog-modal wire:model="confirmingItemDeletion" maxWidth="md">
        <x-slot name="title">
            {{ __('Delete Item') }}
        </x-slot>
        <x-slot name="content">
            {{ __('Are you sure?') }}
        </x-slot>
        <x-slot name="footer">
            <x-button type="button"
                class="border-2 border-collapse bg-yellow-400 text-white hover:bg-transparent hover:text-yellow-500 hover:border-yellow-500"
                wire:click="$set('confirmingItemDeletion', false)" wire:loading.attr="disabled">
                {{__('Cancel')}}
            </x-button>
            <x-button
                class="ml-2 border-2 border-collapse bg-red-400 text-white hover:bg-transparent hover:text-red-500 hover:border-red-500"
                wire:click="deleteItem({{$cdID}})" wire:loading.attr="disabled">
                {{__('Yes')}}
            </x-button>
        </x-slot>
    </x-dialog-modal>
    <x-dialog-modal wire:model="confirmingItemAdd" maxWidth="md">
        <form wire:submit.prevent="store" class="form-control" enctype="multipart/form-data">
            @csrf
            <x-slot name="title">
                {{!isset($this->editMode) ? 'Tambahkan Data' : 'Edit Data'}}
            </x-slot>
            <x-slot name="content">
                <div class="grid grid-flow-row">
                    <div class="grid grid-flow-col grid-cols-3 my-2">
                        <x-label for="pusat" value="{{__('Pusat')}}" class="flex items-center col-span-1" />
                        <select name="pusat" class="flex items-center col-span-2" wire:model="pusat">
                            <option value="null" disabled selected>Pilih Pusat</option>
                            @foreach ($pusats as $pusat)
                            <option value="{{$pusat->id}}">{{$pusat->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <x-input-error for="pusat" class="flex justify-end" />
                    <div class="grid grid-flow-col grid-cols-3 my-2">
                        <x-label for="tanggal" class="flex items-center col-span-1" value="{{__('Tanggal')}}" />
                        <x-input id="tanggal" class="flex items-center col-span-2" type="date" wire:model="tanggal" />
                    </div>
                    <x-input-error for="tanggal" class="flex justify-end" />
                    <div class="grid grid-flow-col grid-cols-3 my-2">
                        <x-label for="tahun" value="{{__('Tahun')}}" class="flex items-center col-span-1" />
                        <select name="tahun" class="flex items-center col-span-2" wire:model="tahun">
                            <option value="null" disabled selected>Pilih Tahun</option>
                            @for ($i=2023; $i>=2013; $i--)
                            <option value="{{$i}}">{{$i}}</option>
                            @endfor
                        </select>
                    </div>
                    <x-input-error for="tahun" class="flex justify-end" />
                    <div class="grid grid-flow-col grid-cols-3 my-2">
                        <x-label for="triwulan" value="{{__('Triwulan')}}" class="flex items-center col-span-1" />
                        <select name="triwulan" class="flex items-center col-span-2" wire:model="triwulan">
                            <option value="null" disabled selected>Pilih Triwulan</option>
                            @for ($i=1; $i<=4; $i++) <option value="{{$i}}">{{$i}}</option>
                                @endfor
                        </select>
                    </div>
                    <x-input-error for="triwulan" class="flex justify-end" />
                    @if (isset($this->editMode))
                    <div class="grid grid-flow-col grid-cols-3 mt-2">
                        <span class="text-sm font-medium text-gray-900 dark:text-white">Current File</span>
                        <div class="col-span-2 flex items-center justify-end">
                            <span class="text-xs">{{$this->oldFile}}</span>
                            <a href="{{Storage::url('filefra/'.$this->oldFile)}}">
                                <span
                                    class="bg-blue-100 text-blue-800 text-xs font-medium ml-4 px-1 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400">
                                    View</span>
                            </a>
                            <button type="button" onclick="showChangeFile()" id="changeFileButton">
                                <span
                                    class="bg-orange-100 text-orange-800 text-xs font-medium ml-2 px-1 py-0.5 rounded dark:bg-gray-700 dark:text-orange-400 border border-orange-400">
                                    Change</span>
                            </button>
                        </div>
                    </div>
                    <div class="grid grid-flow-col grid-cols-3 my-2 hidden" id="changeFile">
                        <x-label for="file" value="{{__('New File')}}" class="flex items-center col-span-1" />
                        <x-input id="file" class="border flex items-center col-span-2" type="file" wire:model="file" />
                    </div>
                    <x-input-error for="file" class="flex justify-end" />
                    @else
                    <div class="grid grid-flow-col grid-cols-3 my-2">
                        <x-label for="file" value="{{__('File')}}" class="flex items-center col-span-1" />
                        <x-input id="file" class="border flex items-center col-span-2" type="file" wire:model="file" />
                    </div>
                    <x-input-error for="file" class="flex justify-end" />
                    @endif
                </div>
            </x-slot>
            <x-slot name="footer">
                <x-button type="button"
                    class="border-2 border-collapse bg-red-400 text-white hover:bg-transparent hover:text-red-500 hover:border-red-500 focus:ring-2 focus:ring-red-200 focus:bg-transparent focus:text-red-500 active:bg-transparent"
                    wire:click="$set('confirmingItemAdd', false)" wire:loading.attr="disabled">
                    {{__('Cancel')}}
                </x-button>
                @if (isset($this->editMode))
                <x-button
                    class="ml-2 border-2 border-collapse bg-green-400 text-white hover:bg-transparent hover:text-green-500 hover:border-green-500 focus:ring-2 focus:ring-green-200 focus:bg-transparent focus:text-green-500 active:bg-transparent"
                    wire:click="saveItemEdit()" wire:loading.attr="disabled">
                    {{__('Update')}}
                </x-button>
                @else
                <x-button
                    class="ml-2 border-2 border-collapse bg-green-400 text-white hover:bg-transparent hover:text-green-500 hover:border-green-500 focus:ring-2 focus:ring-green-200 focus:bg-transparent focus:text-green-500 active:bg-transparent"
                    wire:click="store()" wire:loading.attr="disabled">
                    {{__('Submit')}}
                </x-button>
                @endif
            </x-slot>
        </form>
    </x-dialog-modal>
</div>