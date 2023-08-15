<div class="p-6 lg:p-8 bg-white border-b border-gray-200">
    <div class="mt-2 flex items-center justify-end">
        @can('admin-action')
            <div class="mx-1">
                <x-button type="button"
                    class="px-5 py-3 text-base font-medium text-center border-2 border-collapse bg-green-400 text-white hover:bg-transparent hover:text-green-500 hover:border-green-500 focus:ring-2 focus:ring-green-200 focus:bg-transparent focus:text-green-500 active:bg-transparent"
                    wire:click="confirmItemAdd">
                    Add User
                </x-button>
            </div>
        @endcan
    </div>
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
                                        wire:click="confirmItemEdit()">
                                        Edit
                                    </x-button>
                                    <x-button type="button"
                                        class="ml-2 border-2 border-collapse bg-red-400 text-white hover:bg-transparent hover:text-red-500 hover:border-red-500 focus:ring-2 focus:ring-red-200 focus:bg-transparent focus:text-red-500 active:bg-transparent"
                                        wire:click="confirmItemDelete()">
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
</div>
