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
    	return $scope->all()->toArray();
    }

    //Delete Task
    public function deleteTask($scope, $taskId){
    	return $scope->find($taskId)->delete();
    }

    //Update Task
    public function updateTask($scope, $data, $id){
    	return $scope->find($taskId)
    }
}