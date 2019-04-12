@extends('gamp')


@section('title') Importar @endsection

@section('ventana') Importar
@endsection
@section('descripcion') importacion de los archivos EXCEL para guardado de datos @endsection
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
  <div class="col-md-6">
    <label for="excel"> <b><i>Archivo EXCEL para importar datos</i></b> </label>
    {!! Form::file('excel', null, ['class'=>'form-control', 'placeholder'=>'Introdusca el dato a buscar', 'id'=>'excel', 'required']) !!}
  </div>

  <div class="col-md-4">
    {!! Form::submit('Importar Archivo', ['class'=>'agregar btn btn-primary']) !!}
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
