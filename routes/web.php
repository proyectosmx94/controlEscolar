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
Route::get('/usuariosIndex', 'Auth\RegisterController@index')->name('auth.usuariosIndex');
Route::get('/obtenerEscuelas', 'Auth\RegisterController@obtenerEscuelas')->name('obtenerEscuelas');
Route::get('/getUsuarios', 'Auth\RegisterController@getUsuarios')->name('getUsuarios');
Route::get('/datosModalUsuario', 'Auth\RegisterController@datosModalUsuario')->name('datosModalUsuario');
Route::get('/editUser', 'Auth\RegisterController@editUser')->name('auth.editUser');
Route::get('/home', 'HomeController@index')->name('home');

//Control escolar
Route::get('/control', 'ControlController@index')->name('control.index');
Route::get('storeControl', 'ControlController@store')->name('store');

//Alumno
Route::get('/alumno', 'AlumnoController@index')->name('alumno.index');
Route::get('/storeAlumno', 'AlumnoController@store')->name('store');
Route::get('/editAlumno', 'AlumnoController@edit')->name('edit');
Route::get('/destroyAlumno', 'AlumnoController@destroy')->name('destroy');
Route::get('/getAlumnos', 'AlumnoController@getAlumnos');
Route::get('/datosModalAlumno', 'AlumnoController@datosModalAlumno')->name('datosModalAlumno');

// Escuela
Route::get('/escuela', 'EscuelaController@index')->name('escuela.index');
Route::get('/storeEscuela', 'EscuelaController@store')->name('store');
Route::get('/getEscuelas', 'EscuelaController@getEscuelas');