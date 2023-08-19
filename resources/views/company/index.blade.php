<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Companies') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 " x-data="{ open: false }">
                    <div class="pb-10 flex items-center justify-between text-2xl">
                        {{ __('Current Companies') }}
                        <a href="{{ route('companies.create') }}" class="bg-blue-500 rounded-lg px-6 py-2 text-lg text-white">Add Company</a>
                    </div>
                    <table class="w-full">
                        <tr class=" text-lg">
                            <td class="border-2 text-center font-semibold py-2">Sr no.</td>
                            <td class="border-2 text-center font-semibold py-2">Company Name</td>
                            <td class="border-2 text-center font-semibold py-2">Created By</td>
                            <td class="border-2 text-center font-semibold py-2">Modified By</td>
                            <td class="border-2 text-center font-semibold py-2">Created On</td>
                            <td class="border-2 text-center font-semibold py-2">Modified On</td>
                            <td class="border-2 text-center font-semibold py-2">Action</td>
                        </tr>
                        @foreach ($companies as $key => $company)
                        <tr>
                            <td class="border-2 text-center py-1">{{ $key+1 }}</td>
                            <td class="border-2 text-center py-1">{{ $company->name }}</td>
                            <td class="border-2 text-center py-1">{{ $company->companyCreatedBy->name }}</td>
                            <td class="border-2 text-center py-1">{{ $company->companyModifiedBy->name }}</td>
                            <td class="border-2 text-center py-1">{{ $company->created_at->format('d-M-Y') }}</td>
                            <td class="border-2 text-center py-1">{{ $company->updated_at->format('d-M-Y') }}</td>
                            <td class="border-2 text-center py-1 flex items-center justify-center gap-4"><a class="text-red-500" href="{{ route('companies.delete',$company)}}">delete</a><a class="text-blue-500" href="{{route('companies.edit',$company)}}">edit</a></td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
