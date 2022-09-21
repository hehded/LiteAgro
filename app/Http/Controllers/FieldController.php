<?php

namespace App\Http\Controllers;

use App\Models\Field;
use Illuminate\Http\Request;

class FieldController extends Controller
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
        $field = Field::all();
        return response()->json($field);

    }


    public function create(Request $request)
    {


        $field = new Field();
        $field->address = $request->input('address');
        $field->area = $request->input('area');
        $field->type = $request->input('type');


        $field->save();
        return response()->json($field);


    }


    public function update(Request $request, $id)
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


    public function delete($id)
    {
        $field = Field::find($id);
        $field->delete();
        return response()->json('Field Deleted Successfully');
    }
}
