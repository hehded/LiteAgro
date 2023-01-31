<x-app-layout>
    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add new task
        </h2>

    </x-slot>



    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="dataCreate" method="post" enctype="multipart/form-data">
                        @csrf
                        <label for="timeStart" class="control-label">Start time: </label>

                        <input type="text" name="timeStart" class="form-control"> <br>

                        <label for="timeEnd" class="control-label">End time: </label>
                        

                        <input type="text" name="timeEnd" class="form-control"> <br>

                        <label for="description" class= "control-label">Description:</label>

                        <input type= "text" name="description" class="form-control"> <br>

                        <select name="status" class-"form-control">

                        <option value="In Progress"> In progress</option>
                        <option value="Done"> Done</option>
                        </select>

                        <select name="field_id" class-"form-control">
                        @foreach ($field as $fields)    
                        <option value="{{ $fields->id }}"> Field ID {{ $fields->id }}</option>
                        @endforeach
                        </select>

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


