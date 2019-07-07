<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Centro;
class CentroController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
    if( \Auth::guest() )
      return redirect('index.php/login');
  }

  public function index(Request $request){
    $datos = Centro::all();
    if ($request->ajax()) {
      return $datos;
    }else{
      return view('centro.index', compact('datos'));
    }
  }

  public function store(Request $request){
    $dato = new Centro;
    $dato->fill( $request->all() );
    $dato->save();
    return redirect('/Centro');
  }

  public function show($id){
    $datos = Centro::Where('id', '=', $id)->get();
    return $datos;
  }

  public function update(Request $request, $id){
    $dato = Centro::find($id);
    $dato->fill($request->all());
    $dato->save();
    return redirect('/Centro');
  }

  public function destroy(Request $request, $id){
    if( $request->ajax() ){
      $dato = Centro::find($id);
      $dato->delete();
      return "Centro de salud eliminado";
    }else{
      return redirect('/Centro');
    }
  }


}
