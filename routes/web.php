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

Route::get('/cv', 'CVController@index');

Route::get('/', 'TerminalController@index');

Route::resource('/todo', 'ToDoController');
Route::post('/todo/done/{todo}', 'ToDoController@done');
Route::post('/todo/undone/{todo}', 'ToDoController@undone');

Route::post('/terminal/code', 'TerminalController@code');
Route::post('/terminal/cli', 'TerminalController@cli');
Route::post('/terminal/mkdir', 'TerminalController@mkdir');
Route::get(
    '/terminal/data{path}', 'TerminalController@data'
)->where('path', '(.*)');
Route::post('/terminal', 'TerminalController@ls');
Route::post('/terminal/readme', 'TerminalController@readme');

Route::get('imagick', 'IMagickController@index');

Route::get('code', 'CodeController@index');
Route::get('code/{path}', 'CodeController@show');

Route::get('dart', 'DartController@index');
Route::get('dart/{key}', 'DartController@show');
Route::post('dart/sync', 'DartController@sync');
Route::get('dart/{dart}/edit', 'DartController@edit');
Route::patch('dart/{dart}', 'DartController@update');
