@extends('gamp')

@section('title') Inicio @endsection

@section('ventana') Inicio
@endsection
@section('descripcion') cantidad de personas aseguradas por centro de salud @endsection
@section('titulo')
  <a href="{{asset('index.php')}}" style="color:#fff;"> <i class="fa fa-home"></i> Inicio </a>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

 @endsection

@section('menu')
 class="active-menu"
@endsection

@section('cuerpo')

  @foreach($datos as $dato)
  <div class="col-md-4 col-sm-12 col-xs-12">
    <div class="panel panel-primary text-center no-boder blue">
      <div class="row">
        <div class="col-md-3 col-sm-12 col-xs-12">
          <div class="panel-left pull-left blue">
            <i class="fa fa-home fa-4x"></i>
          </div>
        </div>
        <div class="col-md-9 col-sm-12 col-xs-12">
          <div class="panel-right">
        	   <h3>{{$dato->numero}}</h3>
            <strong> {{$dato->centro_salud }} </strong>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endforeach

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
