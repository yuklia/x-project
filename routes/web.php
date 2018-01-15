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

Route::get('/home', [ 'uses' => 'HomeController@index', 'as' => 'home']);

Route::get('/export-all', ['uses' =>
    'ExportController@exportStudentsToCSV',
    'as' => 'export-all'
]);

Route::get('/export-course-attendance',
    ['uses' => 'ExportController@exportCourseAttendanceToCSV',
        'as' => 'export-course-attendance'
    ]);

Route::get('/', 'ExportController@welcome');
