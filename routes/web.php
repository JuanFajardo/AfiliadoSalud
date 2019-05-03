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

Route::get('Buscar', 'AfiliadoController@buscarGet');
Route::post('Buscar', 'AfiliadoController@buscarPost');

//Route::get('Importar', 'AfiliadoController@importarGet');
//Route::post('Importar', 'AfiliadoController@importarPost');


Route::get('/Reporte', 'ReporteController@index');
Route::post('/Reporte', 'ReporteController@reporte');

Route::get('/clave', 'ReporteController@claveGet')->name('usuario.clave');
Route::post('/clave', 'ReporteController@clavePost')->name('usuario.cambiar');
