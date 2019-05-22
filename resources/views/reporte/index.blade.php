@extends('gamp')

@section('title') Reporte @endsection

@section('ventana') Reporte
@endsection
@section('descripcion') reporte de los centros de salud @endsection
@section('titulo')
  <a href="{{asset('index.php')}}" style="color:#fff;"> <i class="fa fa-home"></i> Gobierno Autónomo Municipal de Potosi - Ciudad Modelo </a>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

 @endsection

@section('menuReporte')
 class="active-menu"
@endsection

@section('cuerpo')
{!! Form::open(['accept-charset'=>'UTF-8', 'enctype'=>'multipart/form-data', 'method'=>'POST', 'files'=>true, 'autocomplete'=>'off', 'id'=>'form-insert'] ) !!}

<div class="row">
  <div class="col-md-3">
    <label for="inicio" > <b><i>Fecha Inicio</i></b> </label>
    {!! Form::date('inicio', null, ['class'=>'form-control', 'placeholder'=>'Fecha Inicio', 'id'=>'inicio', 'required']) !!}
  </div>
  <div class="col-md-3">
    <label for="fin" > <b><i>Fecha Fin</i></b> </label>
    {!! Form::date('fin', null, ['class'=>'form-control', 'placeholder'=>'Fecha Final', 'id'=>'fin', 'required']) !!}
  </div>
  <div class="col-md-3">
    <label for="salud" > <b><i>Centro de Salud</i></b> </label>
    {!! Form::select('salud', ["PAILAVIRI"=>"PAILAVIRI", "CERRO DE PLATA"=>"CERRO DE PLATA", "POTOSI"=>"POTOSI", "SAN ANSELMO"=>"SAN ANSELMO", "VILLA MECANICOS"=>"VILLA MECANICOS", "SAN PEDRO"=>"SAN PEDRO", "VILLA COLON"=>"VILLA COLON", "SAN BENITO"=>"SAN BENITO", "SAN GERARDO"=>"SAN GERARDO", "PARI ORCKO"=>"PARI ORCKO", "CANTUMARCA"=>"CANTUMARCA", "VILLA VENEZUELA"=>"VILLA VENEZUELA", "PLAN 40"=>"PLAN 40", "DELICIAS"=>"DELICIAS", "SAGRADA FAMILIA"=>"SAGRADA FAMILIA", "SAN CRISTOBAL"=>"SAN CRISTOBAL", "AZANGARO"=>"AZANGARO", "MIRAFLORES"=>"MIRAFLORES", "BOLIVIANO CUBANO"=>"BOLIVIANO CUBANO", "HOSPITAL SAN ROQUE"=>"HOSPITAL SAN ROQUE", "HOSPITAL CALCUTA"=>"HOSPITAL CALCUTA" ], null, ['class'=>'form-control', 'placeholder'=>'todo', 'id'=>'salud']) !!}
  </div>
  <div class="col-md-3">
    <label for="usuario" > <b><i>Usuario</i></b> </label>
    {!! Form::select('usuario', \App\User::pluck('email', 'id'), null, ['class'=>'form-control', 'placeholder'=>'todo', 'id'=>'usuario']) !!}
  </div>

</div>

<br><br>
<div class="row">
  <div class="col-md-4">
    <button type="submit" name="btn" value="pdf" class="btn btn-danger"> <i class="fa fa-download"></i> Reporte Generado en PDF</button>
  </div>
  <div class="col-md-4">
    <button type="submit" name="btn"  value="xls" class="btn btn-success"> <i class="fa fa-download"></i> Reporte Generado en EXCEL</button>
  </div>
  <div class="col-md-4">
    <button type="submit" name="btn"  value="doc" class="btn btn-primary"> <i class="fa fa-file-text"></i> Reporte Generado en HTML</button>
  </div>
</div>
{!! Form::close() !!}


@endsection

@section('js')
<script type="text/javascript">
  $(document).ready(function(){
    $('#tablaGamp').DataTable({
      "order": [[ 0, 'asc']],
      "language": {
        "bDeferRender": true,
        "sEmtpyTable": "No ay registros",
        "decimal": ",",
        "thousands": ".",
        "lengthMenu": "Mostrar _MENU_ datos por registros",
        "zeroRecords": "No se encontro nada,  lo siento",
        "info": "Mostrar paginas [_PAGE_] de [_PAGES_]",
        "infoEmpty": "No ay entradas permitidas",
        "search": "Busqueda Especifica ",
        "infoFiltered": "(Busqueda de _MAX_ registros en total)",
        "oPaginate":{
          "sLast":"Final",
          "sFirst":"Principio",
          "sNext":"Siguiente",
          "sPrevious":"Anterior"
        }
      }
    });
  });
</script>
@endsection