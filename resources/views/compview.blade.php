<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ol@7.1.1-dev.1671489689191/dist/ol.css">
<script src="https://cdn.jsdelivr.net/npm/ol@7.1.1-dev.1671489689191/dist/ol.js"></script>

<x-app-layout>
    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            LiteAgro
        </h2>

       
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 border border-blue-500 rounded"><a href="{{ url('/tasks') }}">Tasks</a>
        </button>
        @if (Auth::user()->role == 'admin')
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 border border-blue-500 rounded"><a href="{{ url('/companies') }}">Companies</a>
        </button> 
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 border border-blue-500 rounded"><a href="{{ url('/users') }}">Users</a>
        </button>
        @endif
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 border border-blue-500 rounded"><a href="{{ url('/dashboard') }}">Fields</a>
        </button>
    </x-slot>
    



    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- component -->
                    <table class="min-w-full border-collapse block md:table">
                        <thead class="block md:table-header-group">
                            <tr class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative ">
                                <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                                    ID</th>
                                <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                                    Name</th>
                                <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                                    Reg.Nr</th>

                                <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                                    Vat.Nr</th>

                                <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                                    Address </th>

                                <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                                    Phone </th>
                                <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody class="block md:table-row-group">
                            @foreach ($companies as $company)
                            <tr class="bg-gray-300 border border-grey-500 md:border-none block md:table-row">
                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">ID</span>{{ $company->id }}
                                </td>
                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">ID</span>{{ $company->name }}
                                </td>
                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">ID</span>{{ $company->reg_nr }}
                                </td>
                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">ID</span>{{ $company->vat_nr }}
                                </td>
                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">ID</span>{{ $company->address }}
                                </td>
                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">ID</span>{{ $company->phone }}
                                </td>
                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                    <span class="inline-block w-1/3 md:hidden font-bold">ID</span>
                                    @if(Auth::user()->role == 'admin')
                                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 border border-blue-500 rounded"><a href="{{ url('/companies/edit/' . $company->id) }}">Edit</a></button>
                                    <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 border border-red-500 rounded"><a href="{{ url('/companies/delete/' . $company->id) }}">Delete</a></button>
                                    @endif

                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 border border-blue-500 rounded"><a href="{{ url('/companies/create/') }}">Create</a>
                    </button>





                </div>
            </div>

        </div>

    </div>

    <div id="map" style="height:400px;"></div>



</x-app-layout>