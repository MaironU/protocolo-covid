<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['namespace' => 'Auth'], function(){
    Route::post('login', 'LoginController@login');
    Route::get('logout', 'LoginController@logout');
});

Auth::routes();

Route::get('home', 'HomeController@index')->name('home');

//CRUD TRABAJADORES
Route::group(['namespace' => 'Trabajador', 'middleware' => 'auth'], function(){
    Route::get('trabajadores', 'TrabajadorController@index')->name('detallesT');
    Route::get('trabajadores/perfil/{id}', 'TrabajadorController@mostrar')->name('mostrarT')->where('id','[0-9]+');
    Route::get('trabajadores/crear', 'TrabajadorController@store')->name('crearT');
    Route::post('trabajadores/nuevo', 'TrabajadorController@crear')->name('nuevoT');
    Route::get('trabajadores/editar/{id}', 'TrabajadorController@editar')->name('editarT')->where('id','[0-9]+');
    Route::put('trabajadores/actualizar/{id}', 'TrabajadorController@actualizar')->name('actualizarT')->where('id','[0-9]+');
    Route::delete('trabajadores/{id}', 'TrabajadorController@eliminar')->name('eliminarT')->where('id','[0-9]+');
});

//CRUD SINTOMAS
Route::group(['namespace' => 'Sintoma', 'middleware' => 'auth'], function(){
    Route::get('sintomas', 'SintomaController@index')->name('detallesS');
    Route::get('sintomas/crear', 'SintomaController@store')->name('crearS');
    Route::post('sintomas/nuevo', 'SintomaController@crear')->name('nuevoS');
    Route::get('sintomas/editar/{id}', 'SintomaController@editar')->name('editarS')->where('id','[0-9]+');
    Route::put('sintomas/actualizar/{id}', 'SintomaController@actualizar')->name('actualizarS')->where('id','[0-9]+');
    Route::delete('sintomas/{id}', 'SintomaController@eliminar')->name('eliminarS')->where('id','[0-9]+');
});

//Agregar sintomas a trabajadores
Route::group(['namespace' => 'Reporte'], function(){
    Route::get('reportes', 'ReporteController@index')->name('detallesR');
    Route::post('agregar/{id}', 'ReporteController@agregarSintomas')->name('agregarS')->where('id','[0-9]+');
});

