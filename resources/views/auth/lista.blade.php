@extends('gamp')

@section('title') Usuario @endsection

@section('ventana') Usuario
@endsection
@section('descripcion') por nombre, paterno, materno y ci @endsection
@section('titulo')
  <a href="{{asset('index.php')}}" style="color:#fff;"> <i class="fa fa-home"></i> Gobierno Autónomo Municipal de Potosi - Ciudad Modelo </a>
  <a href="{{url('usuarios/create')}}" class="btn  btn-info pull-right">Nuevo <i class="fa fa-plus"></i></a>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

 @endsection

@section('menuUsuario')
 class="active-menu"
@endsection

@section('cuerpo')

            <div class="panel-body">
                <table id="datosTabla" class="table datatable">
                    <thead>
                        <tr>
                            <th>Nombres y Apellidos</th>
                            <th>Usuario</th>
                            <th>Grupo</th>
                            <th>Centro Salud</th>
                            <th>Editar</th>

                        </tr>
                    </thead>
                    <tbody>
                       @foreach($usuarios as $usuario)
                        <tr>
                            <td>{{$usuario->email}}</td>
                            <td>{{$usuario->name}}</td>
                            <td>{{$usuario->grupo}}</td>
                            <td>{{$usuario->salud}}</td>
                            <td><a href="{{ url('usuarios/'.$usuario->id.'/edit') }}" style="color:#f0ad4e;"> <i class="fa fa-pencil" aria-hidden="true"></i>  </a></td>
                        </tr>
                      @endforeach
                    </tbody>
                </table>


<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Eliminar</h4>
      </div>
      <div class="modal-body">
        <p>¿Esta seguro que desea eliminar este usuario: <strong>
          @if(isset($usuario))
            {{$usuario->nombres}}
          @endif
        </strong>?
        </p>
      </div>
      <div class="modal-footer">
        @if(isset($usuario))
        <a type="button" class="btn btn-info" href="{{url('usuarios/'.$usuario->id)}}">Aceptar</a>
        @endif
        <a type="button" class="btn btn-warning" data-dismiss="modal">Cancelar</a>
      </div>
    </div>
  </div>
</div>
@endsection

@section('js')
<script type="text/javascript">
  $('#datosTabla').DataTable({
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
</script>
@endsection
