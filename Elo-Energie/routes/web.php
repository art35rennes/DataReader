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

    Route::get('/pylons', 'PylonController@show');
    Route::get('/lignes', 'LigneController@show');
    Route::get('/statements', 'StatementController@show');

    Route::get('/pylons/add', 'PylonController@addView');
    Route::post('/pylons/add', 'PylonController@addDb');

    Route::get('/statements/add', 'StatementController@addView');
    Route::post('/statements/add', 'StatementController@addDb');

    Route::get('/statements/data/{statement}', 'DataController@show');
    Route::get('/data/calibration/{statement}', 'DataController@getCalibration');
    Route::get('/data/csv/{statement}', 'DataController@getCsv');
    Route::get('/data/graphStats/{statement}/{data}', 'DataController@getGraphStats');



