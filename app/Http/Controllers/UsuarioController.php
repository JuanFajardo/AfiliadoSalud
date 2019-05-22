<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;

class UsuarioController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
    if( \Auth::guest() )
      return redirect('index.php/login');
  }

  public function index(){
        $usuarios = User::all();
        return view('auth.lista')->with('usuarios', $usuarios);
  }

  public function showRegistrationForm(){
      return view('auth.register');
  }

  protected function validator(array $data)
  {
      return Validator::make($data, [

          'name' => 'required|max:255',
          'email' => 'required|email|max:255',
          'password' => 'required|confirmed|min:6',
          'salud' => 'required|max:255',
          'grupo' => 'required|numeric',
      ]);
  }

  protected function create(Request $data)
  {
    //return "bett0";
      User::create([
          'name' => $data['name'],
          'email' => $data['email'],
          'password' => bcrypt($data['password']),
          'log' => "",
          'salud' => $data['salud'],
          'grupo' => $data['grupo'],
      ]);

      return redirect('/usuarios');
  }

  public function edit($id){
    $user = User::find($id);
    return view('auth.editar', compact('user'));
  }

  public function update(Request $request, $id){
    $user = User::find($id);
    $user->name       = $request->input('name');
    $user->email      = $request->input('email');
    if( strlen($request->input('password')) > 0 )
      $user->password = bcrypt($request->input('password'));
    $user->grupo      = $request->input('grupo');
    $user->salud      = $request->input('salud');
    $user->save();
    return redirect('/usuarios');
  }

  public function viewuser($id){
    $user = User::find($id);
    return view('auth.ver', compact('user'));
  }

  public function delete($id){/*
    $user = User::find($id);
    $user->delete();
    return redirect()->action('Auth\AuthController@index');*/
  }

  public function profile(Request $request){
    $id = \Auth::user()->id;
    $user = User::find($id);
    return view('auth.profile', compact('user'));
  }

  public function profileActulizar(Request $request){
    $id = \Auth::user()->id;
    $user = User::find($id);
    $estado = false;
    if($request->input('estado') == 'on'){
        $estado = true;
    }
    $user->name       = $request->input('name');
    $user->email      = $request->input('email');
    if( strlen($request->input('password')) > 0 )
      $user->password = bcrypt($request->input('password'));
    $user->grupo_id   = $request->input('grupo_id');
    $user->nombres    = $request->input('nombres');
    $user->apellidos  = $request->input('apellidos');
    $user->ci         = $request->input('ci');
    $user->direccion  = $request->input('direccion');
    $user->telefono   = $request->input('telefono');
    $user->observacion= $request->input('observacion');
    $user->estado     = $estado;
    $user->save();
    return  redirect('usuarios/info/ver?msj=1');
  }

}
