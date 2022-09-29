<?php

namespace App\Http\Controllers;

use App\Models\Field;
use Illuminate\Http\Request;
use Termwind\Components\Dd;

class FieldController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all(Request $request)
    {
        // Get All products
        // get All Products From Database
        // dd($request->input());
        $field = null;
        if($request->input('filter')!=null){
            $field = Field::where('id', 'like', '%'.$request->input('filter').'%')->get();}
        else{
            $field = Field::all();
        }
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

    public function filter($name)
    {
        $field = Field::where('name', $name)->get();
        return response()->json($field);
    }

    //filter function to sort by name
    public function sort($name)
    {
        $field = Field::orderBy('name', $name)->get();
        return response()->json($field);
    }

    //filter function to filter by company id and sort by name
    public function filterAndSort($name, $id)
    {
        $field = Field::where('company_id', $id)->orderBy('name', $name)->get();
        return response()->json($field);
    }
}
