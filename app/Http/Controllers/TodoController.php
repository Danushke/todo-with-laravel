<?php

namespace App\Http\Controllers;

use TodoFacade;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function __Construct(){
        $this->task=new Todo();

    }
    public function index(){
        //$response['tasks'] = TodoFacade::all();
        $response['tasks'] = $this->task->all(); // select all from table todo via fillable in models
        //dd($response);
        return view('pages\todo\index') ->with($response);
    }


    public function store(Request $request){
        //dd($request);
        $this->task->create($request->all()); // this statement cannot use if not create fillable in Todo in models

        //we can se bellow code if not fillable in Todo
        /*$this->task->title = $request->title;
        $this->task->save();*/
    }

    public function delete($task_id){
        $task=$this->task->find($task_id);
        $task->delete();
        //dd($task_id);
        //return redirect()->back()->withErrors($validator)->withInput();
        return redirect()->back();
    }

    public function done($task_id){
        $task=$this->task->find($task_id);
        $task->done = 1;
        $task->update();
        return redirect()->back();
    }

    public function edit(Request $request){

        $response['task']=TodoFacade::get($request['task_id']);
        return \view('pages.todo.edit')->with($response);

    }

    public function update(Request $request, $task_id){
        TodoFacade::update($request->all(),$task_id);
        return \redirect()->back();

    }

}
