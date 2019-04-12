<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Afiliado;
use Maatwebsite\Excel\Facades\Excel;

class AfiliadoController extends Controller
{
  public function __construct(){
    //$this->middleware('auth');
  }

  public function index(Request $request){
    $datos = \DB::table('afiliados')->select('sigla', \DB::raw('count(sigla) as numero'), 'centro_salud')->groupBy('sigla', 'centro_salud')->get();
    if ($request->ajax()) {
      return $datos;
    }else{
      return view('afiliado.index', compact('datos'));
    }
  }

  public function create(){
    $datos  = \DB::table('afiliados')->orderBy('afiliados.id', 'desc')->take(10)->get();

    return view('afiliado.registro', compact('datos'));
  }

  public function store(Request $request){

    $datos = explode("|", $request->centro_salud);
    $id_user = \Auth::user()->id;
    $dato = new Afiliado;
    $dato->numero     = $request->numero;
    $dato->matricula  = $request->matricula;
    $dato->paterno    = $request->paterno;
    $dato->materno    = $request->materno;
    $dato->nombre     = $request->nombre;
    $dato->sexo       = $request->sexo;
    $dato->fecha_nacimiento     = $request->fecha_nacimiento;
    $dato->carnet     = $request->carnet;
    $dato->carnet_exp = $request->carnet_exp;
    $dato->regional   = $request->regional;
    $dato->centro_salud         = $datos[0];
    $dato->sigla                = $datos[1];
    $dato->fecha_actualizacion  = date('Y-m-d');
    $dato->id_user              = $id_user;
    $dato->save();

    return redirect('/Afiliado/create');
  }

  public function show($id){
    $datos = Afiliado::Where('id', '=', $id)->get();
    return $datos;
  }

  public function update(Request $request, $id){
    $request["id_user"] = \Auth::user()->id;
    $dato = Afiliado::find($id);
    $dato->fill($request->all());
    $dato->save();
    return redirect('/Afiliado');
  }

  public function destroy(Request $request, $id){
    if( $request->ajax() ){
      $dato = Afiliado::find($id);
      $dato->delete();
      return "Afiliado Eliminado";
    }else{
      return redirect('/Afiliado');
    }
  }

  public function buscarGet(){
    $datos = array();
    return view('afiliado.buscar', compact('datos'));
  }

  public function buscarPost(Request $request){
    $log = new \App\Log;
    $log->usuario = \Auth::user()->name;
    $log->ip = \Request::ip();
    $log->dato = $request->dato;
    $log->opcion = $request->opcion;
    $log->centrosalud = \Auth::user()->salud;
    $datos = \DB::table('afiliados')->where($request->opcion, 'like', strtoupper( $request->dato.'%'))->get();
    return view('afiliado.buscar', compact('datos'));
  }

  public function importarGet(){

    Excel::import('public/AFILIADOS_CSBP_(MARZO_2018).xlsx', function($archivo){

      $respuesta = $archivo->get();

      foreach ($respuesta as $key => $value) {
        echo $value[$key]."<br>";
      }

    })->get();
    return "..";
    return view('afiliado.importar');
  }

  public function importarPost(Request $reques){

  }

}
