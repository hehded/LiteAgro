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

    public function show()
    {
        $field = Field::all();
        return view('dashboard', ['fields'=>$field]);
    }
    public function all(Request $request)
    {

        $query = Field::query();

        $query->where("company_id", $request->attributes("user")->company_id);

        if ($request->input('filter') != null) {

            if ($request->input('filter.type') != null) {
                $query->where('type', 'like', '%' . $request->input('filter.type') . '%');
            }
            if ($request->input('filter.address') != null) {
                $query->where('address', 'like', '%' . $request->input('filter.address') . '%');
            }
            if ($request->input('filter.area') != null) {
                $query->where('area', 'like', '%' . $request->input('filter.area') . '%');
            }
        }
        // if function to order by area or type or address
        if ($request->input('orderBy') != null) {
            // dd();
            if ($request->input('orderBy') == 'type') {
                $query->orderBy('type', 'asc', $request->input('orderBy'));
            }
            if ($request->input('orderBy') == 'address') {
                $query->orderBy('address', 'asc', $request->input('orderBy'));
            }
            if ($request->input('orderBy') == '-type') {
                $query->orderBy('type', 'desc', $request->input('orderBy'));
            }
            if ($request->input('orderBy') == '-address') {
                $query->orderBy('address', 'desc', $request->input('orderBy'));
            }
            if ($request->input('orderBy') == 'name') {
                $query->orderBy('name', 'asc', $request->input('orderBy'));
            }
            if ($request->input('orderBy') == '-name') {
                $query->orderBy('name', 'desc', $request->input('orderBy'));
            }
        }

        //
        return response()->json($query->get());
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
