<?php

namespace App\Http\Controllers;

use App\Models\UserTable;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        // Get All products
        // get All Products From Database
        $users = UserTable::all();
        return response()->json($users);

    }


    public function create(Request $request)
    {


        $users = new UserTable();
        $users->name = $request->input('name');
        $users->surname = $request->input('surname');
        $users->phone = $request->input('phone');
        $users->role = $request->input('role');


        $users->save();
        return response()->json($users);


    }


    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'name' => 'required',
            'surname' => 'required',
            'phone' => 'required',
            'role' => 'required'
        ]);

        $users = UserTable::find($id);


        $users->name = $request->input('name');
        $users->surname = $request->input('surname');
        $users->phone = $request->input('phone');

        $users->save();

        return response()->json($users);

    }


    public function delete($id)
    {
        // DELETE(id)
        // Delete by Id
        $users = UserTable::find($id);
        $users->delete();
        return response()->json('User Deleted Successfully');

    }
}
