@extends('gamp')


@section('title') Registrar @endsection

@section('ventana') Registrar
@endsection
@section('descripcion') de manera manual dato a dato @endsection
@section('titulo')
  <a href="{{asset('index.php')}}" style="color:#fff;"> <i class="fa fa-home"></i> Gobierno Autónomo Municipal de Potosi - Ciudad Modelo </a>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 @endsection

@section('menuAfiliado')
 class="active-menu"
@endsection


@section('cuerpo')

{!! Form::open(['accept-charset'=>'UTF-8', 'enctype'=>'multipart/form-data', 'method'=>'POST', 'route'=>'Afiliado.store', 'files'=>true, 'autocomplete'=>'off', 'id'=>'form-insert'] ) !!}


{!! Form::hidden('numero', '0') !!}

<div class="row">
  <div class="col-md-4">
    <label for="matricula"> <b><i>Matricula</i></b> </label>
    {!! Form::text('matricula', null, ['class'=>'form-control', 'placeholder'=>'Matricula', 'id'=>'matricula', 'required']) !!}
  </div>
  <div class="col-md-3">
    <label for="sexo" > <b><i>Sexo</i></b> </label>
    {!! Form::select('sexo', ['FEMENINO'=>'FEMENINO', 'MASCULINO'=>'MASCULINO'], null, ['class'=>'form-control', 'placeholder'=>'', 'id'=>'sexo', 'required']) !!}
  </div>
  <div class="col-md-3">
    <label for="carnet" > <b><i>Numero Carnet</i></b> </label>
    {!! Form::text('carnet', null, ['class'=>'form-control', 'placeholder'=>'Carnet', 'id'=>'carnet', 'required']) !!}
  </div>
  <div class="col-md-2">
    <label for="nit_" > <b><i>Extendido</i></b> </label>
    {!! Form::select('carnet_exp', ['PT'=>'PT', 'OR'=>'OR', 'LP'=>'LP', 'BN'=>'BN', 'PD'=>'PD', 'SC'=>'SC', 'CB'=>'CB', 'CH'=>'CH', 'TR'=>'TR'], null, ['class'=>'form-control', 'placeholder'=>'', 'id'=>'carnet_exp', 'required']) !!}
  </div>
</div>

<div class="row">
  <div class="col-md-4">
    <label for="nombre"> <b><i>Nombres</i></b> </label>
    {!! Form::text('nombre', null, ['class'=>'form-control', 'placeholder'=>'Nombres', 'id'=>'nombre', 'required']) !!}
  </div>
  <div class="col-md-4">
    <label for="paterno"> <b><i>Ap. Paterno</i></b> </label>
    {!! Form::text('paterno', null, ['class'=>'form-control', 'placeholder'=>'Ap. Paterno', 'id'=>'paterno', 'required']) !!}
  </div>
  <div class="col-md-4">
    <label for="materno"> <b><i>Ap. materno</i></b> </label>
    {!! Form::text('materno', null, ['class'=>'form-control', 'placeholder'=>'Ap. Materno', 'id'=>'materno', 'required']) !!}
  </div>
</div>

<div class="row">
  <div class="col-md-4">
    <label for="fecha_nacimiento"> <b><i>Fecha Nacimiento</i></b> </label>
    {!! Form::date('fecha_nacimiento', null, ['class'=>'form-control', 'placeholder'=>'Fecha Nacimiento', 'id'=>'fecha_nacimiento', 'required']) !!}
  </div>
  <div class="col-md-4">
    <label for="regional"> <b><i>Regional</i></b> </label>
    {!! Form::select('regional', ['LA PAZ'=>'LA PAZ', 'ORURO'=>'ORURO', 'POTOSI'=>'POTOSI', 'COCHABAMBA'=>'COCHABAMBA', 'CHUQUISCA'=>'CHUQUISCA', 'TARIJA'=>'TARIJA', 'BENI'=>'BENI', 'PANDO'=>'PANDO', 'SANTA CRUZ'=>'SANTA CRUZ' ], null, ['class'=>'form-control', 'placeholder'=>'', 'id'=>'regional', 'required']) !!}
  </div>
  <div class="col-md-4">
    <label for="centro_salud"> <b><i>Centro Salud</i></b> </label>
    {!! Form::select('centro_salud', ['ASEGURADOS A LA CAJA BANCARIA ESTATAL DE SALUD|CBES'=>'ASEGURADOS A LA CAJA BANCARIA ESTATAL DE SALUD','ASEGURADOS A LA CAJA PETROLERA DE SALUD|CPS'=>'ASEGURADOS A LA CAJA PETROLERA DE SALUD', 'ASEGURADOS A LA CAJA DE SALUD DE LA BANCA PRIVADA|CSBP'=>'ASEGURADOS A LA CAJA DE SALUD DE LA BANCA PRIVADA', 'ASEGURADOS DE LA CAJA DE SALUD DE CAMINOS|CSC'=>'ASEGURADOS DE LA CAJA DE SALUD DE CAMINOS', 'ASEGURADOS A LA CAJA NACIONAL DE SALUD|CNS'=>'ASEGURADOS A LA CAJA NACIONAL DE SALUD', 'ASEGURADOS A LA CAJA DE SALUD CORDES|CORDES'=>'ASEGURADOS A LA CAJA DE SALUD CORDES', 'CORPORACION DEL SEGURO SOCIAL MILITAR|COSSMIL'=>'CORPORACION DEL SEGURO SOCIAL MILITAR', 'ASEGURADOS AL SEGURO SOCIAL UNIVERSITARIO|SSU'=>'ASEGURADOS AL SEGURO SOCIAL UNIVERSITARIO' ], null, ['class'=>'form-control', 'placeholder'=>'', 'id'=>'centro_salud', 'required']) !!}
  </div>
</div>


<hr>
{!! Form::submit('A&ntilde;adir', ['class'=>'agregar btn btn-primary']) !!}
{!! Form::close() !!}

<hr><br>
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
      <tr>
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
        "search": "Buscar ",
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
