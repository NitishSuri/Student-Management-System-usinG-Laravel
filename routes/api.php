<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/student', 'API\StudentApiController@createStudent');
Route::get('/student', 'API\StudentApiController@getStudents');
Route::get('/students/{id}', 'API\StudentApiController@edit');
Route::post('student/{id}', 'API\StudentApiController@getDeleteStudent');
Route::put('/update/student/{id}', 'API\StudentApiController@update');
