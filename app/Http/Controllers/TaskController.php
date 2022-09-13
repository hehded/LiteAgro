<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
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
        $tasks = Task::all();
        return response()->json($tasks);

    }


    public function create(Request $request)
    {


        $tasks = new Task();
        $tasks->company_id = $request->input('company_id');
        $tasks->user_id = $request->input('user_id');
        $tasks->field_id = $request->input('field_id');
        $tasks->timeStart = $request->input('timeStart');
        $tasks->timeEnd = $request->input('timeEnd');
        $tasks->type = $request->input('type');
        $tasks->description = $request->input('description');


        $tasks->save();
        return response()->json($tasks);


    }


    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'company_id' => 'required',
            'user_id' => 'required',
            'field_id' => 'required',
            'timeStart' => 'required',
            'timeEnd' => 'required',
            'timeType' => 'required',
            'description' => 'required'
        ]);

        $tasks = Task::find($id);


        $tasks->company_id = $request->input('company_id');
        $tasks->user_id = $request->input('user_id');
        $tasks->field_id = $request->input('field_id');
        $tasks->timeStart = $request->input('timeStart');
        $tasks->timeEnd = $request->input('timeEnd');
        $tasks->type = $request->input('type');
        $tasks->description = $request->input('description');

        $tasks->save();

        return response()->json($tasks);

    }


    public function delete($id)
    {
        // DELETE(id)
        // Delete by Id
        $tasks = Task::find($id);
        $tasks->delete();
        return response()->json('Task Deleted Successfully');

    }
}
