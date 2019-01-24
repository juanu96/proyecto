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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('worker','WorkersController');

Route::resource('work_area', 'work_areaController');

Route::resource('job_title', 'job_titlesController');

Route::resource('number','Contact_numberController');


Route::POST('worker/savewa','WorkersController@savewa');



