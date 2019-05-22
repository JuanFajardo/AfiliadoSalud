@extends('gamp')

@section('title') Usuarios @endsection

@section('ventana') Usuarios
@endsection
@section('descripcion') editar usuario @endsection
@section('titulo')
  <a href="{{asset('index.php/usuarios')}}" style="color:#fff;"> <i class="fa fa-home"></i> Gobierno Autónomo Municipal de Potosi - Ciudad Modelo </a>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
@endsection

@section('menuUsuario')
 class="active-menu"
@endsection


@section('cuerpo')

                {!! Form::model($user, ['action'=>['UsuarioController@update', $user->id], 'method'=>'PATCH', 'id'=>'form-create', 'class'=>'form-horizontal', 'role'=>'form', 'autocomplete'=>'off'  ])!!}
                  <h4>Datos de usuario</h4>
                  <hr>
                  <div class="form-group">
                      <label for="salud" class="col-md-4 control-label">Centro de Salud</label>
                      <div class="col-md-6">
                        {!! Form::select('salud', ["PAILAVIRI"=>"PAILAVIRI", "CERRO DE PLATA"=>"CERRO DE PLATA", "POTOSI"=>"POTOSI", "SAN ANSELMO"=>"SAN ANSELMO", "VILLA MECANICOS"=>"VILLA MECANICOS", "SAN PEDRO"=>"SAN PEDRO", "VILLA COLON"=>"VILLA COLON", "SAN BENITO"=>"SAN BENITO", "SAN GERARDO"=>"SAN GERARDO", "PARI ORCKO"=>"PARI ORCKO", "CANTUMARCA"=>"CANTUMARCA", "VILLA VENEZUELA"=>"VILLA VENEZUELA", "PLAN 40"=>"PLAN 40", "DELICIAS"=>"DELICIAS", "SAGRADA FAMILIA"=>"SAGRADA FAMILIA", "SAN CRISTOBAL"=>"SAN CRISTOBAL", "AZANGARO"=>"AZANGARO", "MIRAFLORES"=>"MIRAFLORES", "BOLIVIANO CUBANO"=>"BOLIVIANO CUBANO", "HOSPITAL SAN ROQUE"=>"HOSPITAL SAN ROQUE", "HOSPITAL CALCUTA"=>"HOSPITAL CALCUTA" ], null, ['id'=>'salud', 'class'=>'form-control']) !!}
                      </div>
                  </div>

                  <div class="form-group">
                      <label for="grupo" class="col-md-4 control-label">Grupo</label>
                      <div class="col-md-6">
                        {!! Form::select('grupo', ['Administrador'=>'Administrador', 'Usuario'=>'Usuario'], null, ['id'=>'grupo', 'class'=>'form-control']) !!}
                      </div>
                  </div>
                  <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                      <label for="name" class="col-md-4 control-label">Usuario</label>
                      <div class="col-md-6">
                          {!! Form::text('name',  old('name'), ['id'=>'name', 'class'=>'form-control', 'placeholder'=>'nombreapellido']) !!}
                          @if ($errors->has('name'))
                              <span class="help-block">{{ $errors->first('name') }}</span>
                          @endif
                      </div>
                  </div>
                  <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                      <label for="email" class="col-md-4 control-label">Nombre Completo</label>
                      <div class="col-md-6">
                          {!! Form::email('email',  old('email'), ['id'=>'email', 'class'=>'form-control', 'placeholder'=>'correo@correo.com']) !!}
                          @if ($errors->has('email'))
                              <span class="help-block">{{ $errors->first('email') }}</span>
                          @endif
                      </div>
                  </div>
                  <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                      <label for="password" class="col-md-4 control-label">Contraseña</label>
                      <div class="col-md-6">
                          {!! Form::password('password', ['id'=>'password', 'class'=>'form-control', 'placeholder'=>'Clave s3cr3t4']) !!}
                          @if ($errors->has('password'))
                              <span class="help-block">{{ $errors->first('password') }}</span>
                          @endif
                      </div>
                  </div>


                  <div class="form-group">
                      <div class="col-md-6 col-md-offset-4">
                          <button type="submit" class="btn btn-warning">
                              <i class="fa fa-btn fa-user"></i> Actualizar
                          </button>
                          <a href="{{asset('/index.php/usuarios')}}" class="btn btn-primary">
                            <i class="fa fa-btn fa-times-circle"></i> Cancelar</a>
                      </div>
                  </div>
          {!! Form::close() !!}

@endsection
