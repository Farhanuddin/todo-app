<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
    	'id', 'title', 'completed'
    ];

    //Insert Single Task
    public function insertTask($task){
    	return $this->insert($task);
    }

    //Get All Tasks
    public function getTasks($scope){
    	return $scope->orderBy('id', 'desc')->get()->toArray();
    }

    //Delete Task
    public function deleteTask($scope, $taskId){
    	return $scope->find($taskId)->delete();
    }

    //Update Task
    public function updateTask($scope, $data, $id){
    	$task            = $scope->find($id);
    	$task->title     = $data['title'];
    	$task->completed = $data['completed'];
    	return $task->save();
    }

    //Mark Task Completed..
    public function markTaskComplete($scope, $id){
        $task            = $scope->find($id);
        $task->completed = 1;
        return $task->save();        
    }
}
