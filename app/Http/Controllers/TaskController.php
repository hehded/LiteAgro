<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Field;
use Termwind\Components\Dd;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */




    public function show()
    {
        $task = Task::all();
        return view('tasksview', ['tasks'=>$task]);
    }

    

    public function CreateTask(Request $request)
    {
        $this->validate($request, [
            'timeStart' => 'required|date_format:H:i',
            'timeEnd' => 'required|date_format:H:i',
            'field_id' => 'required|numeric',
            'description',
            'status',
        ]);


        $tasks = new Task();
        $tasks->timeStart = $request->input('timeStart');
        $tasks->timeEnd = $request->input('timeEnd');
        $tasks->field_id = $request->input('field_id');
        $tasks->description = $request->input('description');
        $tasks->status = $request->input('status');


        $tasks->save();

        
        return redirect('/tasks')->with('info', 'Task Created Successfully');


    }

    public function GetTask($id)
    {
        $task = Task::find($id);
        $fields = Field::all($columns = ['id']);

       
        return view('tasksedit', ['tasks' => $task, 'field' => $fields]);
        
    }

    public function GetTaskCreate()   {
        
        $fields = Field::all();
        return view('tasksadd', [ 'field' => $fields]);
        
    }


    public function EditTask(Request $request, $id)
    {
        $this->validate($request, [
            'timeStart' => 'required|date_format:H:i:s',
            'timeEnd' => 'required|date_format:H:i:s',
            'description',
            'field_id' => 'required|numeric',
            'status',
        ]);

        $tasks = Task::find($id);

        

        
        $tasks->timeStart = $request->input('timeStart');
        $tasks->timeEnd = $request->input('timeEnd');
        $tasks->description = $request->input('description');
        $tasks->field_id = $request->input('field_id');
        $tasks->status = $request->input('status');

        $tasks->save();

        return redirect('/tasks')->with('info', 'Task Updated Successfully');

    }

    public function DeleteTask($id)
    {
        $tasks = Task::find($id);
        $tasks->delete();
        return redirect('/tasks')->with('info', 'Task Deleted Successfully');
    }

    public function all()
    {
        // Get All products
        // get All Products From Database
        $tasks = Task::all();
        return response()->json($tasks);

    }


    public function create(Request $request)
    {
        $this->validate($request, [
            
            'field_id' => 'required',
            'timeStart' => 'required|date_format:H:i',
            'timeEnd' => 'required|date_format:H:i',
             'status' => 'required',
            'description' => 'required'
        ]);

        $tasks = new Task();
        $tasks->field_id = $request->input('field_id');
        $tasks->timeStart = $request->input('timeStart');
        $tasks->timeEnd = $request->input('timeEnd');
        $tasks->status = $request->input('status');
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
