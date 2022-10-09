<?php
namespace domain\services;

use App\Models\Todo;

class TodoService{
    protected $task;

    public function __Construct(){
        $this->task=new Todo();

    }

    public function get($task_id){
        return $this->task->find($task_id);
    }

    public function all(){
        return $this->task->all(); // select all from table todo via fillable

    }


    public function store($data){

        $this->task->create($data);


    }

    public function delete($task_id){
        $task=$this->task->find($task_id);
        $task->delete();


    }

    public function done($task_id){
        $task=$this->task->find($task_id);
        $task->done = 1;
        $task->update();

    }


    public function update(array $data, $task_id){
        $task = $this->task->find($task_id);
        $task->update($this->edit($task, $data));

        /* we can use bellow code without using "**$task->update($this->edit($task, $data));**"
           problem is if want to pass 100 data to the task we should write 100 code lines
        */
        // $task->title=$data['title'];
        // $task->update();

    }

    public function edit(Todo $task, $data){

        return array_merge($task->toArray(), $data);

    }

}
