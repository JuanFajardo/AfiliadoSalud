@extends('gamp')

@section('title') Busqueda @endsection

@section('ventana') Busqueda
@endsection
@section('descripcion') por nombre, paterno, materno y ci @endsection
@section('titulo')
  <a href="{{asset('index.php')}}" style="color:#fff;"> <i class="fa fa-home"></i> Gobierno Autónomo Municipal de Potosi - Ciudad Modelo </a>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

 @endsection

@section('menuBuscar')
 class="active-menu"
@endsection

@section('cuerpo')

{!! Form::open(['accept-charset'=>'UTF-8', 'enctype'=>'multipart/form-data', 'method'=>'POST', 'files'=>true, 'autocomplete'=>'off', 'id'=>'form-insert'] ) !!}

<div class="row">
  <div class="col-md-3">
    <label for="">CI</label>
    {!! Form::text('ci', null, ['class'=>'form-control', 'placeholder'=>'Introdusca el CI', 'id'=>'ci']) !!}
  </div>
  <div class="col-md-3">
    <label for="">Nombre</label>
    {!! Form::text('nombre', null, ['class'=>'form-control', 'placeholder'=>'Introdusca el Nombre', 'id'=>'nombre']) !!}
  </div>
  <div class="col-md-3">
    <label for="">Ap. Paterno</label>
    {!! Form::text('paterno', null, ['class'=>'form-control', 'placeholder'=>'Introdusca el Paterno', 'id'=>'paterno']) !!}
  </div>
  <div class="col-md-3">
    <label for="">Ap. Materno</label>
    {!! Form::text('materno', null, ['class'=>'form-control', 'placeholder'=>'Introdusca el Materno', 'id'=>'materno']) !!}
  </div>
  <!--
  <div class="col-md-4">
    {!! Form::select('opcion', ['nombre'=>'Nombre', 'paterno'=>'Ap. Paterno', 'materno'=>'Ap. Materno', 'carnet'=>'Carnet de Identidad'], null, ['class'=>'form-control', 'placeholder'=>'', 'id'=>'direccion_', 'required']) !!}
  </div>
-->

  <div class="col-md-2">
    <input type="submit" name="boton" value="Buscar Persona" class="btn btn-primary">

  </div>
  <div class="col-md-3">
    <input type="submit" name="boton" value="Limpiar Datos" class="btn btn-success">
  </div>
</div>
{!! Form::close() !!}


<br><hr>
@if( strlen($msj) > 10 )
  <center>   <b>{{$msj}}</b> </center>
@else
  <center>Total resultados de la busqueda : <b>{{$msj}}</b></center>
@endif
<br><hr>
<table id="tablaGamp" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th>Matricula</th>
      <th>Nombre Completo</th>
      <th>Carnet</th>
      <th>Sexo</th>

      <th>Regional</th>
      <th>C. Salud</th>
    </tr>
  </thead>
  <tbody>
    @foreach($datos as $dato)
      <tr data-id="{{ $dato->id }}">
        <td>{{ $dato->matricula }}</td>
        <td>{{ $dato->nombre }}, {{ $dato->paterno }} {{ $dato->materno }}</td>
        <td>{{ $dato->carnet }}</td>
        <td>{{ $dato->sexo }}</td>
        <td>{{ $dato->regional }}</td>
        <td>{{ $dato->centro_salud }}</td>
      </tr>
    @endforeach
  </tbody>
</table>

@endsection

@section('js')
<script type="text/javascript">

  /*$('#limpiar').click(function(){
    $('#ci').val("");
    $('#nombre').val("");
    $('#paterno').val("");
    $('#materno').val("");
  });*/

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
