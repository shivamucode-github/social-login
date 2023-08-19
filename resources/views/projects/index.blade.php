<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Projects') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100" x-data="{ open: false }">
                    <div class="pb-10 flex items-center justify-between text-2xl">
                        {{ __('Current Projects') }}
                        <a href="{{ route('projects.create') }}"
                            class="bg-blue-500 rounded-lg px-6 py-2 text-lg text-white">Add Project</a>
                    </div>
                    <div class="w-screen h-screen fixed bg-black/70 inset-0 flex items-center justify-center"
                        x-show="open">
                        <div class="px-12 py-4 w-1/2 bg-white rounded-xl">
                            <h1>{{ __('Add Project') }}</h1>
                            <form action="{{ route('projects.store') }}" method="post" class="">

                                <div class="mt-4">
                                    <x-input-label for="name" :value="__('Name')" />

                                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                        required />

                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>
                                <div class="flex items-center gap-16 mt-4 justify-center">
                                    <button type="submit"
                                        class="bg-blue-500 rounded-lg px-6 py-2 text-lg text-white">{{ __('Add') }}</button>
                                    <button type="button" class="bg-gray-300 rounded-lg px-6 py-2 text-lg"
                                        x-on:click="open = ! open">Back</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <table class="w-full text-lg">
                        <tr>
                            <td class="py-2 border-2 text-center font-semibold">Sr no.</td>
                            <td class="py-2 border-2 text-center font-semibold">Project Name</td>
                            <td class="py-2 border-2 text-center font-semibold">Created By</td>
                            <td class="py-2 border-2 text-center font-semibold">Modified_by</td>
                            <td class="py-2 border-2 text-center font-semibold">Created On</td>
                            <td class="py-2 border-2 text-center font-semibold">Modified On</td>
                            <td class="py-2 border-2 text-center font-semibold">Action</td>
                        </tr>
                        @foreach ($projects as $key => $project)
                            <tr>
                                <td  class="border-2 text-center py-1">{{ $key + 1 }}</td>
                                <td  class="border-2 text-center py-1">{{ $project->name }}</td>
                                <td  class="border-2 text-center py-1">{{ $project->userCreatedBy->name }}</td>
                                <td  class="border-2 text-center py-1">{{ $project->userModifiedBy->name }}</td>
                                <td  class="border-2 text-center py-1">{{ $project->created_at->format('d-M-Y') }}</td>
                                <td  class="border-2 text-center py-1">{{ $project->updated_at->format('d-M-Y') }}</td>
                                <td  class="border-2 text-center py-1 flex items-center justify-center gap-4"><a class="text-red-600" href="{{ route('projects.delete',$project)}}">delete</a><a class="text-blue-600" href="{{ route('projects.edit',$project->slug) }}">edit</a></td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
