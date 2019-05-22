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
    if ( !isset( \Auth::user()->id ) )
      return view('auth.login');
    else
      return redirect('/Afiliado');
});

Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');
Route::resource('Afiliado', 'AfiliadoController');
//Busqueda Afgiliado
Route::get('Buscar', 'AfiliadoController@buscarGet');
Route::post('Buscar', 'AfiliadoController@buscarPost');
//Reporte
Route::get('/Reporte', 'ReporteController@index');
Route::post('/Reporte', 'ReporteController@reporte');
//Cambio de contraseña por perfil
Route::get('/clave', 'ReporteController@claveGet')->name('usuario.clave');
Route::post('/clave', 'ReporteController@clavePost')->name('usuario.cambiar');
// Administracion de Usuarios


Route::get('usuarios', 'UsuarioController@index');
Route::get('usuarios/create', 'UsuarioController@showRegistrationForm');
Route::post('usuarios', 'UsuarioController@create');
Route::get('usuarios/{id}', 'UsuarioController@viewuser');
Route::get('usuarios/{id}/edit', 'UsuarioController@edit');
Route::patch('usuarios/{id}', 'UsuarioController@update');
Route::get('usuarios/info/ver', 'UsuarioController@profile');
Route::post('usuarios/info/ver', 'UsuarioController@profileActulizar');
