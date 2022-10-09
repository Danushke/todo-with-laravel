<?php

namespace App\Http\Controllers;

use domain\Facades\TodoFacade;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoControllerFacade extends Controller
{
    public function index(){
        $response['tasks'] = TodoFacade::all();
        return view('pages\todo\index') ->with($response);
    }


    public function store(Request $request){
        TodoFacade::store($request->all());
        return redirect()->back();

    }

    public function delete($task_id){
        TodoFacade::delete($task_id);
        return redirect()->back();
    }

    public function done($task_id){
        TodoFacade::done($task_id);
        return redirect()->back();
    }

    public function edit(Request $request){ //to load the form data to edit.blade.php

        $response['task']=TodoFacade::get($request['task_id']);
        return \view('pages.todo.edit')->with($response);

    }

    public function updatee(Request $request, $task_id){ // to update the data which load the edit form
        TodoFacade::update($request->all(),$task_id);
        return \redirect()->back();

    }

}
