<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('', [ 'uses' => 'ExportController@welcome', 'as' => 'home'] );
Route::get('/students',  'StudentController@index');
Route::get('export', [ 'uses' => 'ExportController@export', 'as' => 'export'] );