<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReporteController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
    if( \Auth::guest() )
      return redirect('index.php/login');
  }

  public function index(){

      return view('reporte.index');
    }

    public function reporte(Request $request){
      $inicio     = date("Y-m-d",strtotime($request->inicio."- 1 days")); 	    //"2019-02-01"
      $fin	      = date("Y-m-d",strtotime($request->fin."+ 1 days"));       //"2019-02-28"


      $salud    = $request->salud;	//null
      $usuario  = $request->usuario;	      //null
      $btn	    = $request->btn;       //"pdf"


      $raw1 =  $salud   != null   ? "centrosalud = '".$salud."' " : " 1 = 1 ";
      $raw2 =  $usuario != null   ? "usuario = '".$usuario."' " : " 1 = 1 ";


      $datos = \DB::table('logs')->where('created_at', '>', $inicio)
                                 ->where('created_at', '<', $fin)
                                 ->whereRaw($raw1)
                                 ->whereRaw($raw2)
                                 ->get();
      
      if($btn == "doc"){
        return view('reporte.pdf', compact('datos', 'inicio', 'fin'));
      }elseif ($btn == "xls") {
        return view('reporte.excel', compact('datos', 'inicio', 'fin'));
      }elseif ($btn == "pdf") {
        $pdf = \PDF::loadView('reporte.pdf', compact('datos', 'inicio', 'fin'));
        return $pdf->download('listado.pdf');
      }
    }


  public function claveGet(){
    return view('auth.clave');
  }



  public function clavePost(Request $request){
    //return $request->all();
    /*$id = \Auth::user()->id;
    $dato = \App\User::find($id);
    $dato->password = bcrypt($request->clave);
    $dato->save();
    $clave = "OK";
    return redirect('/')->with( ['clave' => $clave] );;
    */
  }

  public function ordeCompra($id){
    $compras = \DB::table('compras')->join('users', 'compras.id_user', '=', 'users.id')
                                  ->join('proveedors', 'compras.id_proveedor', '=', 'proveedors.id')
                                  ->select('compras.*', 'users.email', 'proveedors.*')
                                  ->where('compras.id', '=', $id)
                                  ->get();
    $detalles = \DB::table('detalles')->where('detalles.id_compra', '=', $id)->get();

    return view('reporte.ordenCompra', compact('compras', 'detalles'));
  }

}
