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
/*
Route::get('/', function () {
    if ( !isset( \Auth::user()->id ) ){
      $link = asset('index.php/login');
      return redirect($link);
    }else
      return redirect('/');
});
*/
Route::get('/', function () {
  if (Auth::guest()){
    return redirect(asset('index.php/login'));
  }else{
    return view('master');
  }
});


Route::get('/home', function(){
  if ( !isset( \Auth::user()->id ) ){
    $link = asset('index.php/login');
    return redirect($link);
  }else
    return redirect('/');
});

//Route::get('/', 'AfiliadoController@index');


Route::resource('Centro', 'CentroController');
Route::resource('Afiliado', 'AfiliadoController');

//Busqueda Afgiliado
Route::get('Buscar', 'AfiliadoController@buscarGet');
Route::post('Buscar', 'AfiliadoController@buscarPost');

//Reporte
Route::get('/Reporte', 'ReporteController@index');
Route::post('/Reporte', 'ReporteController@reporte');
Route::get('/reporte/Formulario/{id}', 'ReporteController@formulario');

//Cambio de contraseña por perfil
Route::get('/clave', 'ReporteController@claveGet')->name('usuario.clave');
Route::post('/clave', 'ReporteController@clavePost')->name('usuario.cambiar');

// Administracion de Usuarios
Route::get('usuarios', 'UsuarioController@index');
Route::get('usuarios/create', 'UsuarioController@showRegistrationForm');
Route::post('usuarios', 'UsuarioController@create')->name('usuarios');
Route::get('usuarios/{id}', 'UsuarioController@viewuser');
Route::get('usuarios/{id}/edit', 'UsuarioController@edit');
Route::patch('usuarios/{id}', 'UsuarioController@update')->name('usuario.update');
Route::get('usuarios/info/ver', 'UsuarioController@profile');
Route::post('usuarios/info/ver', 'UsuarioController@profileActulizar');

Auth::routes();
Route::get('/Encargado/Agregar/{id}', 'UsuarioController@encargadoAgregar');
Route::get('/Encargado/Eliminar/{id}', 'UsuarioController@encargadoEliminar');
