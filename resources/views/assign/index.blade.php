<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Assignment') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 grid gap-10">
                    <div class="pb-10 flex items-center justify-between text-2xl">
                        {{ __('Assignments') }}
                        <a href="{{ route('assign.create') }}"
                            class="bg-blue-500 rounded-lg px-6 py-2 text-lg text-white">Assign here</a>
                    </div>
                    <div class="text-center border-2 border-gray-500 rounded-xl overflow-hidden">
                        <h2 class="text-2xl font-semibold py-4 w-full bg-gray-300">User Roles</h2>
                        <table class="w-full">
                            <tr class=" text-lg">
                                <td class="border-2 border-gray-400 border-b-0 text-center font-semibold py-2">Sr no.
                                </td>
                                <td class="border-2 border-gray-400 border-b-0 text-center font-semibold py-2">Username
                                </td>
                                <td class="border-2 border-gray-400 border-b-0 text-center font-semibold py-2">Roles
                                </td>
                                <td class="border-2 border-gray-400 border-b-0 text-center font-semibold py-2">Companies
                                </td>
                                <td class="border-2 border-gray-400 border-b-0 text-center font-semibold py-2">Projects
                                </td>
                                <td class="border-2 border-gray-400 border-b-0 text-center font-semibold py-2">Action
                                </td>
                            </tr>
                            @foreach ($users as $key => $user)
                                <tr>
                                    <td class="border-2 border-gray-400 border-b-0 text-center py-1">{{ $key + 1 }}
                                    </td>
                                    <td class="border-2 border-gray-400 border-b-0 text-center py-1">{{ $user->name }}
                                    </td>
                                    <td class="border-2 border-gray-400 border-b-0 text-center py-1">
                                        @php
                                            if (empty($user->role)) {
                                                echo 'NA';
                                            } else {
                                                echo $user->role;
                                            }
                                        @endphp
                                    </td>
                                    <td class="border-2 border-gray-400  border-b-0 text-center py-1">
                                        @php
                                            if (empty($user->company)) {
                                                echo 'NA';
                                            } else {
                                                echo $user->company;
                                            }
                                        @endphp
                                    </td>
                                    <td class="border-2 border-gray-400 border-b-0 text-center py-1">
                                        @php
                                            if (empty($user->project)) {
                                                echo 'NA';
                                            } else {
                                                echo $user->project;
                                            }
                                        @endphp
                                    </td>
                                    <td class="border-2 border-gray-400 border-b-0 text-center py-1">
                                        <a href="{{ route('assign.edit', $user->slug) }}">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
