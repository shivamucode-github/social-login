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
                    <form action="{{ route('assign.store') }}" method="post">
                        @csrf
                        <div class="mb-6 text-lg">
                            <x-input-label for="roles" :value="__('Select User')" />

                            <select name="user" id="user" class="w-full mt-3 py-3 px-6">
                                <option value="" selected>None</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('user')" class="mt-2" />
                        </div>

                        <div class="mb-6">
                            <x-input-label for="roles" :value="__('Select Roles')" />
                            <div id="values-roles" class="hidden">
                                <ul id="values-role" class="px-4 py-2 border-2 border-gray-500 rounded-lg mt-4 flex flex-wrap gap-3">
                                </ul>
                            </div>
                            <select name="roles[]" id="roles" multiple class="w-full mt-3">
                                @foreach ($roles as $role)
                                    <option class=" py-1 px-6" value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('roles')" class="mt-2" />
                        </div>

                        <div class="mb-6">
                            <x-input-label for="projects" :value="__('Select Projects')" />
                            <div id="values-projects" class="hidden">
                                <ul id="values-project" class="px-4 py-2 border-2 border-gray-500 rounded-lg mt-4 flex flex-wrap gap-3">
                                </ul>
                            </div>

                            <select name="projects[]" id="projects" multiple class="w-full mt-3">
                                @foreach ($projects as $project)
                                    <option class=" py-1 px-6" value="{{ $project->id }}">{{ $project->name }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('projects')" class="mt-2" />
                        </div>

                        <div class="mb-6">
                            <x-input-label for="companies" :value="__('Select Companies')" />
                            <div id="values-companies" class="hidden">
                                <ul id="values-company" class="px-4 py-2 border-2 border-gray-500 rounded-lg mt-4 flex flex-wrap gap-3">
                                </ul>
                            </div>
                            <select name="companies[]" id="companies" multiple class="w-full mt-3">
                                @foreach ($companies as $company)
                                    <option class=" py-1 px-6" value="{{ $company->id }}">{{ $company->name }}</option>
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
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#projects').on('click', function() {
                let rolesList = document.getElementById("projects");
                let outputBox = document.getElementById("values-project");
                let collections = rolesList.selectedOptions;
                let output = "";

                for (let collection of collections) {
                        output += '<li class="rounded-full bg-blue-400 text-white font-semibold px-4 py-2">'+collection.label+'</li>';
                }

                if (output === "") {
                    $('#values-projects').hide();
                }else{
                    $('#values-projects').show();
                }
                outputBox.innerHTML = output;
            })

            $('#roles').on('click', function() {
                let rolesList = document.getElementById("roles");
                let outputBox = document.getElementById("values-role");
                let collections = rolesList.selectedOptions;
                let output = "";

                for (let collection of collections) {
                        output += '<li class="rounded-full bg-purple-400 text-white font-semibold px-4 py-2">'+collection.label+'</li>';
                }

                if (output === "") {
                    $('#values-roles').hide();
                }else{
                    $('#values-roles').show();
                }
                outputBox.innerHTML = output;
            })

            $('#companies').on('click', function() {
                let rolesList = document.getElementById("companies");
                let outputBox = document.getElementById("values-company");
                let collections = rolesList.selectedOptions;
                let output = "";

                for (let collection of collections) {
                        output += '<li class="rounded-full bg-green-400 text-white font-semibold px-4 py-2">'+collection.label+'</li>';
                }

                if (output === "") {
                    $('#values-companies').hide();
                }else{
                    $('#values-companies').show();
                }
                outputBox.innerHTML = output;
            })
        });
    </script>
</x-app-layout>
