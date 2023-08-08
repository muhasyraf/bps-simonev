<div class="p-4">
    <x-button type="button"
        class="px-5 py-3 text-base font-medium text-center border-2 border-collapse bg-green-400 text-white hover:bg-transparent hover:text-green-500 hover:border-green-500 focus:ring-2 focus:ring-green-200 focus:bg-transparent focus:text-green-500 active:bg-transparent"
        wire:click="confirmItemAdd">
        Import Excel
    </x-button>
    <x-dialog-modal wire:model="confirmingItemAdd" maxWidth="md">
        <form wire:submit.prevent="store" class="form-control" enctype="multipart/form-data">
            @csrf
            <x-slot name="title">
                {{__('Import Excel Data')}}
            </x-slot>
            <x-slot name="content">
                <div class="grid grid-flow-row">
                    <div class="grid grid-flow-col grid-cols-3 my-2">
                        <x-label for="file" value="{{__('File')}}" class="flex items-center col-span-1" />
                        <x-input id="file" class="border flex items-center col-span-2" type="file" wire:model="file" />
                    </div>
                    <x-input-error for="file" class="flex justify-end" />
                    <div wire:loading wire:target="file" class="flex justify-end text-end">Mengupload...</div>
                </div>
            </x-slot>
            <x-slot name="footer">
                <x-button type="button"
                    class="border-2 border-collapse bg-red-400 text-white hover:bg-transparent hover:text-red-500 hover:border-red-500 focus:ring-2 focus:ring-red-200 focus:bg-transparent focus:text-red-500 active:bg-transparent"
                    wire:click="$set('confirmingItemAdd', false)" wire:loading.attr="disabled">
                    {{__('Cancel')}}
                </x-button>
                <x-button
                    class="ml-2 border-2 border-collapse bg-green-400 text-white hover:bg-transparent hover:text-green-500 hover:border-green-500 focus:ring-2 focus:ring-green-200 focus:bg-transparent focus:text-green-500 active:bg-transparent"
                    wire:click="store()" wire:loading.attr="disabled">
                    {{__('Submit')}}
                </x-button>
            </x-slot>
        </form>
    </x-dialog-modal>
</div>