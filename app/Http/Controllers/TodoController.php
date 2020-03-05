<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $task;


    public function __construct(){
        $this->task = new Task();
    }

    public function index()
    {
        return view('todo.index');
    }

    public function getTasks(){
        
        $response           = array();
        $response['status'] = 200;
        $response['data']   = null;
        $response['msg']    = '';

        $tasks              = null; 

        try{
    
            $tasks = $this->task->getTasks($this->task);

            if( is_array($tasks) && count($tasks) > 0){
                
                $response['status'] = 200;                
                $response['data']   = $tasks;
                $response['msg']    = 'Tasks successfully fetched..';
                
            }else{

                $response['status'] = 500;                
                $response['data']   = null;
                $response['msg']    = 'Tasks couldnot be fetched..';
            }

        }catch(\Exception $ex){
                $response['status'] = 500;                
                $response['data']   = null;
                $response['msg']    = $ex->getMessage();
        }

        return $response;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{

            $response           = array();
            $response['status'] = 200;
            $response['data']   = null;
            $response['msg']    = '';
            $inserted           = true;

            if($request->has('task')){

                $task                         = $request->input('task');
                $taskInsertArray              = array();
                $taskInsertArray['title']     = $task;
                $taskInsertArray['completed'] = 0;

                $inserted = $this->task->insertTask($taskInsertArray);

                if($inserted){
                    $response['status'] = 200;
                    $response['msg']    = 'Task Successfully Added..';
                }else{
                    $response['status'] = 400;
                    $response['msg']    = 'Task Couldnot be Added..';
                }

            }else{
                $response['status'] = 500;
                $response['data']   = null;
                $response['msg']    = 'Cannot add Task, Task is Empty';            
            }

        }catch(\Exception $ex){
                $response['status'] = 500;                
                $response['data']   = null;
                $response['msg']    = $ex->getMessage();
        }

        return $response;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        if(!empty($id)){
            return $this->task->find($id);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function edit(tasks $tasks)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {   
        try{

            $response           = array();
            $response['status'] = 200;
            $response['data']   = null;
            $response['msg']    = '';
            $inserted           = true;

            if($request->has('id') &&  $request->has('title')){

                $taskId                       = $request->input('id');
                $taskUpdateArray              = array();
                $taskUpdateArray['title']     = $request->input('title');
                $taskUpdateArray['completed'] = 0;

                $updatedTask = $this->task->updateTask($taskUpdateArray, $id);

                if($inserted){
                    $response['status'] = 200;
                    $response['msg']    = 'Task Successfully Added..';
                }else{
                    $response['status'] = 400;
                    $response['msg']    = 'Task Couldnot be Added..';
                }

            }else{
                $response['status'] = 500;
                $response['data']   = null;
                $response['msg']    = 'Cannot add Task, Task is Empty';            
            }

        }catch(\Exception $ex){
                $response['status'] = 500;                
                $response['data']   = null;
                $response['msg']    = $ex->getMessage();
        }

        return $response;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function destroy($taskid=null)
    {
        $response           = array();
        $response['status'] = 204;
        $response['data']   = null;
        $response['msg']    = '';
        $deleted            = true;

        if(!empty($taskid)){
            $deleted = $this->task->deleteTask($this->task, $taskid);
            
            if($deleted){
                $response['status'] = 204;
                $response['data']   = 'Deleted Successfully..';
                $response['msg']    = '';
            }

        }

        return $response;
    }
}