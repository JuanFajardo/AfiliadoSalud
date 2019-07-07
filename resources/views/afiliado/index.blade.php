@extends('master')

@section('title') Inicio @endsection

@section('titulo')
  <h4> <i class="ti-home menu-icon"></i> Inicio</h4>
 @endsection

@section('menu')
 active
@endsection

@section('listado')
  <?php $suma = 0; ?>
  @foreach($datos as $dato)
   <?php $suma = $suma + $dato->numero; ?>
  @endforeach
  @foreach($datos as $dato)
  <div class="col-md-3 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <p class="card-title text-md-center text-xl-left"> {{$dato->centro_salud}} </p>
        <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
          <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"> {{$dato->numero}} </h3>
          <i class="ti-calendar icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
        </div>
        <p class="mb-0 mt-2 text-danger"> <?php echo  (($dato->numero * 100 ) / $suma ); ?> % <span class="text-black ml-1"><small>{{$dato->sigla}}</small></span></p>
      </div>
    </div>
  </div>
  @endforeach
@endsection

@section('cuerpo')
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
