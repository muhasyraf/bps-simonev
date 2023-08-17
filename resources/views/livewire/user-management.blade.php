<div class="p-6 lg:p-8 bg-white border-b border-gray-200">
    {{-- <div class="mt-2 flex items-center justify-end">
        @can('admin-action')
            <div class="mx-1">
                <x-button type="button"
                    class="px-5 py-3 text-base font-medium text-center border-2 border-collapse bg-green-400 text-white hover:bg-transparent hover:text-green-500 hover:border-green-500 focus:ring-2 focus:ring-green-200 focus:bg-transparent focus:text-green-500 active:bg-transparent"
                    wire:click="confirmItemAdd">
                    Add User
                </x-button>
            </div>
        @endcan
    </div> --}}
    <div class="mt-6 flex lg:justify-center overflow-x-auto md:justify-start shadow-md sm:rounded-lg">
        <table class="table-auto w-full">
            <thead>
                <tr class="border-4 border-slate-400">
                    <th class="text-center bg-slate-200 px-2 py-2">
                        ID
                    </th>
                    <th class="text-center bg-slate-200 px-2 py-2">
                        Name
                    </th>
                    <th class="text-center bg-slate-200 px-2 py-2">
                        Email
                    </th>
                    <th class="text-center bg-slate-200 px-2 py-2">
                        Role
                    </th>
                    <th class="text-center bg-slate-200 px-2 py-2">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($users as $user)
                    <tr class="border-x-4 border-t-2 border-slate-400">
                        <td class="bg-slate-200 px-2 py-2">
                            <div class="flex justify-center">
                                {{ $user->id }}
                            </div>
                        </td>
                        <td class="bg-transparent px-2 py-2">{{ $user->name }}</td>
                        <td class="bg-slate-200 px-2 py-2">{{ $user->email }}
                        </td>
                        <td class="bg-transparent px-2 py-2">
                            {{ ucwords($user->role->name) }}
                        </td>
                        <td class="bg-slate-200 px-2 py-2">
                            <div class="flex justify-center">
                                @can('admin-action')
                                    <x-button type="button"
                                        class="ml-2 border-2 border-collapse bg-yellow-400 text-white hover:bg-transparent hover:text-yellow-500 hover:border-yellow-500 focus:ring-2 focus:ring-yellow-200 focus:bg-transparent focus:text-yellow-500 active:bg-transparent"
                                        wire:click="confirmItemEdit({{ $user }})">
                                        Edit
                                    </x-button>
                                    <x-button type="button"
                                        class="ml-2 border-2 border-collapse bg-red-400 text-white hover:bg-transparent hover:text-red-500 hover:border-red-500 focus:ring-2 focus:ring-red-200 focus:bg-transparent focus:text-red-500 active:bg-transparent"
                                        wire:click="confirmItemDelete({{ $user->id }})">
                                        Delete
                                    </x-button>
                                @endcan
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <x-dialog-modal wire:model="confirmingItemDeletion" maxWidth="md">
        <x-slot name="title">
            {{ __('Delete User') }}
        </x-slot>
        <x-slot name="content">
            {{ __('Are you sure?') }}
        </x-slot>
        <x-slot name="footer">
            <x-button type="button"
                class="border-2 border-collapse bg-yellow-400 text-white hover:bg-transparent hover:text-yellow-500 hover:border-yellow-500"
                wire:click="$set('confirmingItemDeletion', false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-button>
            <x-button
                class="ml-2 border-2 border-collapse bg-red-400 text-white hover:bg-transparent hover:text-red-500 hover:border-red-500"
                wire:click="deleteItem({{ $cdID }})" wire:loading.attr="disabled">
                {{ __('Yes') }}
            </x-button>
        </x-slot>
    </x-dialog-modal>
    <x-dialog-modal wire:model="confirmingItemAdd" maxWidth="md">
        <form wire:submit.prevent="store" class="form-control" enctype="multipart/form-data">
            @csrf
            <x-slot name="title">
                {{ __('Edit User') }}
            </x-slot>
            <x-slot name="content">
                <div class="grid grid-flow-row">
                    <div class="grid grid-flow-col grid-cols-3 my-2">
                        <x-label for="name" value="{{ __('Nama') }}" class="flex items-center col-span-1" />
                        <x-input id="name" class="flex items-center col-span-2" type="text" wire:model="name" />
                    </div>
                    <x-input-error for="nama" class="flex justify-end" />
                    <div class="grid grid-flow-col grid-cols-3 my-2">
                        <x-label for="email" class="flex items-center col-span-1" value="{{ __('Email') }}" />
                        <x-input id="email" class="flex items-center col-span-2" type="email"
                            wire:model="email" />
                    </div>
                    <x-input-error for="email" class="flex justify-end" />
                    <div class="grid grid-flow-col grid-cols-3 my-2">
                        <x-label for="role_id" value="{{ __('Role') }}" class="flex items-center col-span-1" />
                        <select name="role_id" class="flex items-center col-span-2" wire:model="role_id">
                            <option value="null" disabled selected>Pilih Role</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ ucwords($role->name) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <x-input-error for="role_id" class="flex justify-end" />
                </div>
            </x-slot>
            <x-slot name="footer">
                <x-button type="button"
                    class="border-2 border-collapse bg-red-400 text-white hover:bg-transparent hover:text-red-500 hover:border-red-500 focus:ring-2 focus:ring-red-200 focus:bg-transparent focus:text-red-500 active:bg-transparent"
                    wire:click="$set('confirmingItemAdd', false)" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-button>
                <x-button
                    class="ml-2 border-2 border-collapse bg-green-400 text-white hover:bg-transparent hover:text-green-500 hover:border-green-500 focus:ring-2 focus:ring-green-200 focus:bg-transparent focus:text-green-500 active:bg-transparent"
                    wire:click="saveItemEdit()" wire:loading.attr="disabled">
                    {{ __('Update') }}
                </x-button>
            </x-slot>
        </form>
    </x-dialog-modal>
</div>
