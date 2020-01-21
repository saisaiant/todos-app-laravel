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

Route::get('/', function () {
    return view('welcome');
});

Route::get('todos', 'TodoController@index');
Route::get('todos/{todo}', 'TodoController@show');
Route::get('new-todos', 'TodoController@create');
Route::post('store-todos', 'TodoController@store');
Route::get('todos/{todo}/edit', 'TodoController@edit');
Route::put('todos/{todo}', 'TodoController@update')->name('update.todos');

Route::get('todos/{todo}/delete', 'TodoController@destroy');

Route::get('todos/{todo}/complete', 'TodoController@complete');