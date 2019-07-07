<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Afiliado;
use Maatwebsite\Excel\Facades\Excel;

class AfiliadoController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
    if( \Auth::guest() )
      return redirect('index.php/login');
  }

  public function index(Request $request){
    $datos = \DB::table('afiliados')->select('sigla', \DB::raw('count(sigla) as numero'), 'centro_salud')->groupBy('sigla', 'centro_salud')->get();
    $msj = "Aun no se realizo una busqueda";
    if ($request->ajax()) {
      return $datos;
    }else{
      return view('afiliado.index', compact('datos', 'msj'));
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
    $msj = "Aun no se realizo una busqueda";
    return view('afiliado.buscar', compact('datos', 'msj'));
  }

  public function buscarPost(Request $request){

    if($request->boton == "Limpiar Datos"){
      return redirect('/Buscar#Datos');
    }

    $log = new \App\Log;
    $log->usuario = \Auth::user()->name;
    $log->ip = \Request::ip();
    $log->dato = $request->ci . " " . $request->nombre . " " . $request->paterno . " " . $request->materno . " " . $request->fecha_nacimiento;
    $log->opcion = "";
    $log->centrosalud = \Auth::user()->salud;
    $log->save();

    $ci = $nombre = $paterno = $materno = $fecha_nacimiento = " 1 = 1";
    $link = asset('index.php/Buscar');

    if(isset($request->ci) && strlen($request->ci) > 4 ){
      $ci = " carnet like ('".$request->ci."%') ";
    }elseif($request->ci == "" && $request->nombre  == "" && $request->paterno == ""  && $request->materno == "" && $request->fecha_nacimiento == "" ){
      return "<script>alert('Los campos de busqueda estan vacios'); location.href='".$link."';</script>";

    }elseif( $request->paterno == ""  && $request->materno == ""  && $request->ci == ""){
      return "<script>alert('Ingrese algun apellido'); location.href='".$link."';</script>";

    }elseif( ($request->nombre == ""  && $request->materno != "" && $request->ci == "") || ($request->nombre == ""  && $request->paterno != "" && $request->ci == "" ) ){
      return "<script>alert('Ingrese un nombre'); location.href='".$link."';</script>";

    }elseif(
      ($request->ci[0] != "%" && $request->ci != "'"  && $request->ci[0] == " " || !isset($request->ci) )||
      ($request->nombre[0] != "%" && $request->nombre != "'"  && $request->nombre[0] == " " && !isset($request->nombre) )||
      ($request->paterno[0] != "%" && $request->paterno != "'"  && $request->paterno[0] == " " && !isset($request->paterno) )||
      ($request->materno[0] != "%" && $request->materno != "'"  && $request->materno[0] == " " && !isset($request->materno))||
      ($request->fecha_nacimiento[0] != "%" && $request->fecha_nacimiento != "'"  && $request->fecha_nacimiento[0] == " " && !isset($request->fecha_nacimiento))
    ){

      if( isset($request->nombre) ){
        $nombre = " nombre like ('%".strtoupper($request->nombre)."%')";
      }
      if( isset($request->paterno) ){
        $paterno = " paterno like ('".strtoupper($request->paterno)."%')";
      }
      if( isset($request->materno) ){
        $materno = " materno like ('".strtoupper($request->materno)."%')";
      }
      if( isset($request->fecha_nacimiento) ){
        $fecha_nacimiento = " fecha_nacimiento = '". date('Y-m-d' , strtotime($request->fecha_nacimiento))."' ";
      }

    }else{
      $ci = $nombre = $paterno = $materno = $fecha_nacimiento = " 1 = -1";
    }
    $datos = \DB::table('afiliados')
                                    //->whereRaw($request->opcion, 'like', strtoupper( $request->dato.'%'))
                                    ->whereRaw( $ci )
                                    ->whereRaw( $nombre )
                                    ->whereRaw( $paterno )
                                    ->whereRaw( $materno )
                                    ->whereRaw( $fecha_nacimiento )
                                    ->get();
    if( count($datos) == 0){
      $msj = "No se encontro ningun dato.";
    }else{
      $msj = count($datos);
    }

    return view('afiliado.buscar', compact('datos', 'msj'));
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
