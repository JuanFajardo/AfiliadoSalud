@extends('master')

@section('title') Busqueda @endsection

@section('titulo')
  <h4> <i class="ti-search  menu-icon"></i> Busqueda</h4>
 @endsection

@section('buscar')
 active
@endsection

@section('cuerpo')

{!! Form::open(['accept-charset'=>'UTF-8', 'enctype'=>'multipart/form-data', 'method'=>'POST', 'files'=>true, 'autocomplete'=>'off', 'id'=>'form-insert'] ) !!}
<div id="Datos">
  <div class="row">
    <!--<div class="col-md-12 col-xl-3">
      <label for="">CI</label>
      {!! Form::text('ci', null, ['class'=>'form-control', 'placeholder'=>'Introdusca el CI', 'id'=>'ci', 'autofocus']) !!}
    </div>-->
    {!! Form::hidden('ci', null ) !!}
    <div class="col-md-12 col-xl-3">
      <label for="">Nombre</label>
      {!! Form::text('nombre', null, ['class'=>'form-control', 'placeholder'=>'Introdusca el Nombre', 'id'=>'nombre']) !!}
    </div>
    <div class="col-md-12 col-xl-3">
      <label for="">Ap. Paterno</label>
      {!! Form::text('paterno', null, ['class'=>'form-control', 'placeholder'=>'Introdusca el Paterno', 'id'=>'paterno']) !!}
    </div>
    <div class="col-md-12 col-xl-3">
      <label for="">Ap. Materno</label>
      {!! Form::text('materno', null, ['class'=>'form-control', 'placeholder'=>'Introdusca el Materno', 'id'=>'materno']) !!}
    </div>
    <!--<div class="col-md-12 col-xl-3">
      <label for="">Fecha Nac.</label>
      {!! Form::date('fecha_nacimiento', null, ['class'=>'form-control', 'placeholder'=>'', 'id'=>'fecha_nacimiento_']) !!}
    </div>-->
    {!! Form::hidden('fecha_nacimiento', null ) !!}
  </div>

  <div class="row" style="padding-top:15px;">
    <div class="col-md-12 col-xl-6">
      <button type="submit" name="boton" class="btn btn-primary btn-icon-text" accesskey="p" value="Buscar Persona"> <i class="ti-search menu-icon"></i> Buscar <u>P</u>ersona </button>
    </div>
    <div class="col-md-12 col-xl-6">
      <button type="submit" name="boton" class="btn btn-light" accesskey="l" value="Limpiar Datos"> <i class="ti-brush-alt menu-icon"></i> <u>L</u>impiar Datos  </button>
    </div>
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

<div class="table-responsive" id="Buscar">
  <table id="tablaGamp" class="table table-striped" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th>Matricula</th>
        <th>Nombre Completo</th>
        <th>Fecha Nac.</th>
        <th>Carnet</th>
        <th>Sexo</th>
        <th>Regional</th>
        <th>C. Salud</th>
        <th>Imprimir</th>
      </tr>
    </thead>
    <tbody>
      @foreach($datos as $dato)
        <tr data-id="{{ $dato->id }}">
          <td>{{ $dato->matricula }}</td>
          <td>{{ $dato->nombre }}, {{ $dato->paterno }} {{ $dato->materno }}</td>
          <td>{{ $dato->fecha_nacimiento }}</td>
          <td>{{ $dato->carnet }}</td>
          <td>{{ $dato->sexo }}</td>
          <td>{{ $dato->regional }}</td>
          <td>{{ $dato->centro_salud }}</td>
          <td> <a href="{{asset('index.php/reporte/Formulario/'.$dato->id)}}"> <i class="ti-printer menu-icon"></i> </a></td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
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
          "sLast":" Final",
          "sFirst":"Principio ",
          "sNext":" Siguiente",
          "sPrevious":"Anterior "
        }
      }
    });
  });
</script>
@endsection
