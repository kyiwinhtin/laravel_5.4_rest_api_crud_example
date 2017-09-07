<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('api/v1/lessons',['uses' =>'LessonController@index' , 'as' => 'lessons.index']);
Route::get('api/v1/lessons/{id}',['uses' =>'LessonController@show' , 'as' => 'lessons.show']);
Route::get('api/v1/lessons/create',['uses' =>'LessonController@create' , 'as' => 'lessons.show']);
Route::post('api/v1/lessons/store',['uses' =>'LessonController@store' , 'as' => 'lessons.store']);
Route::get('api/v1/lessons/edit/{id}',['uses' =>'LessonController@edit' , 'as' => 'lessons.edit']);
Route::post('api/v1/lessons/update/{id}',['uses' =>'LessonController@update' , 'as' => 'lessons.update']);
Route::post('api/v1/lessons/delete/{id}',['uses' =>'LessonController@delete' , 'as' => 'lessons.delete']);
Route::get('/', function () {
    return view('welcome');
});
