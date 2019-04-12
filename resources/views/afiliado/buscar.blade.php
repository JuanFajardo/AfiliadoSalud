@extends('gamp')


@section('title') Busqueda @endsection

@section('ventana') Busqueda
@endsection
@section('descripcion') por nombre, paterno, materno y ci @endsection
@section('titulo')
  <a href="{{asset('index.php')}}" style="color:#fff;"> <i class="fa fa-home"></i> Inicio </a>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

 @endsection

@section('menuBuscar')
 class="active-menu"
@endsection

@section('cuerpo')

{!! Form::open(['accept-charset'=>'UTF-8', 'enctype'=>'multipart/form-data', 'method'=>'POST', 'files'=>true, 'autocomplete'=>'off', 'id'=>'form-insert'] ) !!}

<div class="row">
  <div class="col-md-4">
    {!! Form::text('dato', null, ['class'=>'form-control', 'placeholder'=>'Introdusca el dato a buscar', 'id'=>'dato', 'required']) !!}
  </div>
  <div class="col-md-4">
    {!! Form::select('opcion', ['nombre'=>'Nombre', 'paterno'=>'Ap. Paterno', 'materno'=>'Ap. Materno', 'carnet'=>'Carnet de Identidad'], null, ['class'=>'form-control', 'placeholder'=>'', 'id'=>'direccion_', 'required']) !!}
  </div>

  <div class="col-md-4">
    {!! Form::submit('Busqueda General', ['class'=>'agregar btn btn-primary']) !!}
  </div>

</div>
{!! Form::close() !!}
<br><hr><br>
<table id="tablaGamp" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th>Matricula</th>
      <th>Carnet</th>
      <th>Sexo</th>
      <th>Nombre Completo</th>
      <th>Regional</th>
      <th>C. Salud</th>
    </tr>
  </thead>
  <tbody>
    @foreach($datos as $dato)
      <tr data-id="{{ $dato->id }}">
        <td>{{ $dato->matricula }}</td>
        <td>{{ $dato->carnet }}</td>
        <td>{{ $dato->sexo }}</td>
        <td>{{ $dato->nombre }}, {{ $dato->paterno }} {{ $dato->materno }}</td>
        <td>{{ $dato->regional }}</td>
        <td>{{ $dato->centro_salud }}</td>
      </tr>
    @endforeach
  </tbody>
</table>

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
