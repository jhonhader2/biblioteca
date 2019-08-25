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

Route::get('/', 'PrestamoController@index');

Route::resource('autores', 'AutorController');
Route::resource('categorias', 'CategoriaController');
Route::resource('libros', 'LibroController');
Route::resource('prestamos', 'PrestamoController');
Route::resource('usuarios', 'UsuarioController');
Route::resource('estados', 'EstadoController');