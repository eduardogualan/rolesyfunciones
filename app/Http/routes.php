<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */

Route::get('/', function () {
    $data['titulo'] = 'ACCESO AL SISTEMA URF';
    return view('login.login', $data);
    //return bcrypt('12345');
});

Route::resource('auth', 'AuthController');
Route::get('home', 'AuthController@Home');
Route::resource('rol', 'RolController');
Route::resource('usuarios', 'CuentaController');

Route::post('funcionesasignadosxrol','FuncionesController@FuncionAsignadoXrol');
Route::post('asignarfuncionesxrol','FuncionesController@asignarFunciones');
Route::post('desasignarfuncionesxrol','FuncionesController@desasignarFunciones');
