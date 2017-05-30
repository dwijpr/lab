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

Route::get('/', 'TerminalController@index');

Route::resource('/todo', 'ToDoController');
Route::post('/todo/done/{todo}', 'ToDoController@done');
Route::post('/todo/undone/{todo}', 'ToDoController@undone');

Route::post('/terminal', 'TerminalController@ls');

Route::get('imagick', 'IMagickController@index');

Route::get('code', 'CodeController@index');
Route::get('code/{path}', 'CodeController@show');

Route::get('dart', 'DartController@index');
Route::get('dart/{key}', 'DartController@show');
Route::post('dart/sync', 'DartController@sync');
Route::get('dart/{dart}/edit', 'DartController@edit');
Route::patch('dart/{dart}', 'DartController@update');
