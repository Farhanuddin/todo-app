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

Route::get('gettasks', 'TodoController@getTasks');

Route::post('add-task', 'TodoController@store');

Route::delete('delete-task/{taskid}', 'TodoController@destroy');

Route::get('gettask/{id}', 'TodoController@show');

Route::put('gettask', 'TodoController@update');
