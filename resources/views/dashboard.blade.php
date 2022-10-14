<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <table class="border-collapse border border-slate-500 ... text-center">
                    <tr class="font-bold">
                        <td class=" border border-slate-600 ...">Id</td>
                        <td class="border border-slate-600 ...">Name</td>
                        <td class="border border-slate-600 ...">Reg_nr</td>
                        <td class="border border-slate-600 ...">Vat_nr</td>
                        <td class="border border-slate-600 ...">Address</td>
                        <td class="border border-slate-600 ...">Phone</td>
                    </tr>
                    {{-- make a foreach loop for going through companies table data --}}
                    @foreach ($companies as $company)
                    <tr>
                        <td class="font-bold border border-slate-600 ... p-1">{{ $company->id }}</td>
                        <td class="font-mono border border-slate-600 ... p-1">{{ $company->name }}</td>
                        <td class="font-mono border border-slate-600 ... p-1">{{ $company->reg_nr }}</td>
                        <td class="font-mono border border-slate-600 ... p-1">{{ $company->vat_nr }}</td>
                        <td class="font-mono border border-slate-600 ... p-1">{{ $company->address }}</td>
                        <td class="font-mono border border-slate-600 ... p-1">{{ $company->phone }}</td>
                    </tr>
                    @endforeach
                </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
