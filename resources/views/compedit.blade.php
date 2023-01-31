<x-app-layout>
    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Companies Editing
        </h2>

    </x-slot>



    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="dataUpdate{{ $companies->id }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <label for="name" class="control-label">Name: </label>

                        <input type="text" name="name" class="form-control" value="{{ $companies->name }}"> <br>

                        
                        <label for="reg_nr" class="control-label">Reg.Nr: </label>

                        <input type="text" name="reg_nr" class="form-control" value="{{ $companies->reg_nr }}"> <br>

                        <label for="vat_nr" class= "control-label">Vat.Nr:</label>

                        <input type= "text" name="vat_nr" class="form-control" value="{{ $companies->vat_nr }}"> <br>

                        <label for="address" class= "control-label">Address:</label>

                        <input type= "text" name="address" class="form-control" value="{{ $companies->address }}"> <br>

                        <label for="phone" class= "control-label">Phone:</label>

                        <input type= "text" name="phone" class="form-control" value="{{ $companies->phone }}"> <br>
                        
                        <input type="submit" class="btn btn-primary">
                    


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
