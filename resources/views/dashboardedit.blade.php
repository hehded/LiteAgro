<x-app-layout>
    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Table Editing
        </h2>

    </x-slot>



    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="dataUpdate{{ $data->id }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <label for="address" class="control-label">Address: </label>

                        <input type="text" name="address" class="form-control" value="{{ $data->address }}"> <br>

                        <label for="area" class="control-label">Area: </label>

                        
                        <input type="text" name="area" class="form-control" value="{{ $data->area }}"> <br>

                        <label for="type" class= "control-label">Type:</label>

                        <input type= "text" name="type" class="form-control" value="{{ $data->type }}"> <br>

                        <select name="company_id" class-"form-control">
                        @foreach ($company as $companies)
                        <option value="{{ $companies->id }}"> Company ID {{ $companies->id }}</option>
                        @endforeach
                        </select>

                        <button type="submit" class="p-4 bg-blue-400"> Create</button>


                        @if ($errors->any())
                        <div class="alert alert-danger bg-red">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    </form>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
