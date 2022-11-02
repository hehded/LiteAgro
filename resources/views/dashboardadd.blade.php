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
                    <form action="dataCreate" method="post" enctype="multipart/form-data">
                        @csrf
                        <label for="address" class="control-label">Address: </label>

                        <input type="text" name="address" class="form-control"> <br>

                        <label for="area" class="control-label">Area: </label>

                        <input type="text" name="area" class="form-control"> <br>

                        <label for="type" class= "control-label">Type:</label>

                        <input type= "text" name="type" class="form-control"> <br>

                        <label for="company_id" class= "control-label">Company ID</label>

                        <input type= "text" name="company_id" class="form-control"> <br>

                        <input type="submit" class="btn btn-primary">


                    </form>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
