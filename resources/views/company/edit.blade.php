<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Update Company') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex justify-center items-center">
            <div class="bg-white dark:bg-gray-800 overflow-hidden w-1/2 shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 shadow ">
                    <h1>{{ __('Add Company') }}</h1>
                    <form action="{{ route('companies.update', $company) }}" method="post" class="w-full">
                        @csrf
                        <div class="mt-4">
                            <x-input-label for="name" :value="__('Name')" />

                            <x-text-input id="name" value="{{ $company->name }}" class="block mt-1 w-full"
                                type="text" name="name" required />

                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                        <div class="flex items-center gap-16 mt-4 justify-end">
                            <button type="submit" class="bg-blue-500 rounded-lg px-6 py-2 text-lg text-white">
                                {{ __('Update') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
