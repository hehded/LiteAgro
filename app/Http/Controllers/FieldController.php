<?php

namespace App\Http\Controllers;

use App\Models\Field;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function GetAllField()
    {
        // Get All products
        // get All Products From Database
        $field = Field::all();
        return response()->json($field);

    }


    public function CreateField(Request $request)
    {


        $field = new Field();
        $field->address = $request->input('address');
        $field->area = $request->input('area');
        $field->type = $request->input('type');


        $field->save();
        return response()->json($field);


    }


    public function UpdateField(Request $request, $id)
    {

        $this->validate($request, [
            'name' => 'required',
            'area' => 'required',
            'type' => 'required',
        ]);

        $field = Field::find($id);


        $field->address = $request->input('address');
        $field->area = $request->input('area');
        $field->type = $request->input('type');

        $field->save();

        return response()->json($field);

    }


    public function DeleteField($id)
    {
        $field = Field::find($id);
        $field->delete();
        return response()->json('Field Deleted Successfully');
    }
}
