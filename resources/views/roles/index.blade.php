<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Roles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100" x-data="{ open: false }">
                    <div class="pb-10 flex items-center justify-between  text-2xl">
                        {{ __('Current Roles') }}
                        <a href={{route('roles.create')}} class="bg-blue-500 rounded-lg px-6 py-2 text-lg text-white">Add
                            Role</a>
                    </div>

                    <table class="w-full">
                        <tr class="text-lg">
                            <td class="border-2 text-center py-2 font-semibold">Sr no.</td>
                            <td class="border-2 text-center py-2 font-semibold">Role Name</td>
                            <td class="border-2 text-center py-2 font-semibold">Slug</td>
                            <td class="border-2 text-center py-2 font-semibold">Created By</td>
                            <td class="border-2 text-center py-2 font-semibold">Created On</td>
                            <td class="border-2 text-center py-2 font-semibold">Modified On</td>
                            <td class="border-2 text-center py-2 font-semibold">Action</td>
                        </tr>
                        @foreach ($roles as $key => $role)
                            <tr>
                                <td class="border-2 text-center py-1">{{ $key + 1 }}</td>
                                <td class="border-2 text-center py-1">{{ $role->name }}</td>
                                <td class="border-2 text-center py-1">{{ $role->slug }}</td>
                                <td class="border-2 text-center py-1">{{ $role->user->name }}</td>
                                <td class="border-2 text-center py-1">{{ $role->created_at->format('d-M-Y') }}</td>
                                <td class="border-2 text-center py-1">{{ $role->updated_at->format('d-M-Y') }}</td>
                                <td class="border-2 text-center py-1"><a href="{{ route('roles.edit',$role)}}">edit</a></td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
