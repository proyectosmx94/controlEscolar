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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Control escolar
Route::get('/control', 'ControlController@index')->name('control.index');
Route::get('storeControl', 'ControlController@store')->name('store');

//Alumno
Route::get('/alumno', 'AlumnoController@index')->name('alumno.index');
Route::get('/storeAlumno', 'AlumnoController@store')->name('store');