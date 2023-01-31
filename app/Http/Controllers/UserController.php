<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;
use App\Models\Company;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function show()
    {
        $user = Users::all();
        return view('userview', ['users' => $user]);
    }


    
    public function GetUser($id)
    {
        $user = Users::find($id);
        $company = Company::all($columns = ['id']);
        return view('useredit', ['users' => $user, 'companies' => $company]);
    }

    public function GetUserCreate()
    {
        $company = Company::all($columns = ['id']);
        return view('useradd', ['companies' => $company]);
    }




    public function CreateUser(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:100|min:3|regex:/^[a-zA-Z]+$/u',
            'email' => 'required|email|max:255|unique:users,email,',
            'company_id' => 'required|numeric',
            'role' => 'required|max:255'
        ]);

        $users = new Users();
        $users->name = $request->input('name');
        $users->email = $request->input('email');
        $users->password = Hash::make($request->input('password'));
        $users->company_id = $request->input('company_id');
        $users->role = $request->input('role');


        $users->save();
        return redirect('/users')->with('info', 'User Created Successfully');
    }

    public function EditUser(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:100|min:3|regex:/^[a-zA-Z]+$/u',
            'email' => 'required|email|max:255',
            'company_id' => 'required|numeric',
            'role' => 'required|max:255'
        ]);

        $users = Users::find($id);

        $users->name = $request->input('name');
        $users->email = $request->input('email');
        $users->password = Hash::make($request->input('password'));
        $users->company_id = $request->input('company_id');
        $users->role = $request->input('role');

        $users->save();

        return redirect('/users')->with('info', 'User Updated Successfully');
    }

    public function DeleteUser($id)
    {
        // DELETE(id)
        // Delete by Id
        $users = Users::find($id);
        $users->delete();
        return redirect('/users')->with('info', 'User Deleted Successfully');
    }

    public function all()
    {
        // Get All products
        // get All Products From Database
        $users = Users::all();
        return response()->json($users);
    }


    public function create(Request $request)
    {


        $users = new Users();
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

        $users = Users::find($id);


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
        $users = Users::find($id);
        $users->delete();
        return response()->json('User Deleted Successfully');
    }

    public function get($id)
    {
        // GET(id)
        // Get by Id
        $users = Users::find($id);
        return response()->json($users);
    }
}
