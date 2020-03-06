<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Get All Tasks..
Route::get('gettasks', 'TodoController@getTasks');

//Add Task
Route::post('add-task', 'TodoController@store')->name('api.add-task');

//Delete Single Task
Route::delete('delete-task/{taskid}', 'TodoController@destroy');

//Get Single Task
Route::get('gettask/{id}', 'TodoController@show');

//Update Single Task
Route::put('gettask', 'TodoController@update');

//Mark Task Completed..
Route::put('gettask-complete', 'TodoController@markCompleted');

//Clear Completed Tasks
Route::post('clear-complete-task', 'TodoController@clearCompleteTasks')->name('api.add-task');
