<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('User Assignment') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex justify-center items-center">
            <div class="bg-white dark:bg-gray-800 overflow-hidden w-1/2 shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('assign.update') }}" method="post">
                        @csrf
                        <div class="mb-6 text-lg">
                            <x-input-label for="roles" :value="__('Select User')" />

                            <select name="user" id="user" class="w-full mt-3">
                                <option disabled value="">None</option>
                                @foreach ($users as $user)
                                    @if ($user->id == $findUser->id)
                                        <option selected value="{{ $user->id }}">{{ $user->name }}</option>
                                    @else
                                        <option disabled value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('user')" class="mt-2" />
                        </div>

                        <div class="mb-6">
                            <x-input-label for="roles" :value="__('Select Roles')" />

                            <select name="roles[]" id="roles" multiple class="w-full mt-3">
                                @foreach ($roles as $role)
                                    <option @if ($findUser->roleAssigned->contains($role->id)) {{ 'selected' }} @endif
                                        value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('roles')" class="mt-2" />
                        </div>

                        <div class="mb-6">
                            <x-input-label for="projects" :value="__('Select Projects')" />

                            <select name="projects[]" id="projects" multiple class="w-full mt-3">
                                @foreach ($projects as $project)
                                    <option @if ($findUser->projectAssigned->contains($project->id)) {{ 'selected' }} @endif
                                        value="{{ $project->id }}">
                                        {{ $project->name }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('projects')" class="mt-2" />
                        </div>

                        <div class="mb-6">
                            <x-input-label for="companies" :value="__('Select Companies')" />

                            <select name="companies[]" id="companies" multiple class="w-full mt-3">
                                @foreach ($companies as $company)
                                    <option @if ($findUser->companyAssigned->contains($company->id)) {{ 'selected' }} @endif
                                        value="{{ $company->id }}">{{ $company->name }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('companies')" class="mt-2" />
                        </div>
                        <div class="flex justify-end mt-4">
                            <x-primary-button>
                                {{ __('Assign') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
