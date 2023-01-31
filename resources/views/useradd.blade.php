<x-app-layout>
    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            User Add
        </h2>

    </x-slot>



    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="dataCreate" method="post" enctype="multipart/form-data">
                        @csrf
                        <label for="name" class="control-label">Name: </label>

                        <input type="text" name="name" class="form-control"> <br>

                        <label for="email" class="control-label">Email: </label>

                        <input type="text" name="email" class="form-control" > <br>

                        <label for="password" class= "control-label">Password:</label>

                        <input type= "text" name="password" class="form-control"> <br>

                        <!-- <label for="role" class= "control-label">Role:</label>

                        <input type= "text" name="role" class="form-control"> <br> -->

                        <select name="role" class-"form-control">
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                        <option value="manager">Manager</option>
                        <option value="company">Company</option>
                        </select>
                        <select name="company_id" class-"form-control">
                        @foreach ($companies as $company)
                        <option value="{{ $company->id }}"> Company ID {{ $company->id }}</option>
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
