@extends('gamp')

@section('title') Usuarios @endsection

@section('ventana') Usuarios
@endsection
@section('descripcion') creacion de un nuevo usuario @endsection
@section('titulo')
  <a href="{{asset('index.php/usuarios')}}" style="color:#fff;"> <i class="fa fa-home"></i> Gobierno Autónomo Municipal de Potosi - Ciudad Modelo </a>

  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

 @endsection

@section('menuUsuario')
 class="active-menu"
@endsection

@section('cuerpo')

                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Nombres Y Apellidos</label>
                            <div class="col-md-6">
                                <input id="" type="text" class="form-control" name="email" value="{{ old('email') }}" required>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nombre de Usuario </label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('grupo') ? ' has-error' : '' }}">
                            <label for="grupo" class="col-md-4 control-label">Grupo</label>
                            <div class="col-md-6">
                                <select name="grupo" id="grupo">
                                  <option value="Administrador">Administrador</option>
                                  <option value="Usuario">Usuario</option>
                                </select>
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('salud') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Centro de Salud</label>
                            <div class="col-md-6">
                                <select name="salud" id="salud">
                                  <option value="PAILAVIRI">PAILAVIRI</option>
                                  <option value="CERRO DE PLATA">CERRO DE PLATA</option>
                                  <option value="POTOSI">POTOSI</option>
                                  <option value="SAN ANSELMO">SAN ANSELMO</option>
                                  <option value="VILLA MECANICOS">VILLA MECANICOS</option>
                                  <option value="SAN PEDRO">SAN PEDRO</option>
                                  <option value="VILLA COLON">VILLA COLON</option>
                                  <option value="SAN BENITO">SAN BENITO</option>
                                  <option value="SAN GERARDO">SAN GERARDO</option>
                                  <option value="PARI ORCKO">PARI ORCKO</option>
                                  <option value="CANTUMARCA">CANTUMARCA</option>
                                  <option value="VILLA VENEZUELA">VILLA VENEZUELA</option>
                                  <option value="PLAN 40">PLAN 40</option>
                                  <option value="DELICIAS">DELICIAS</option>
                                  <option value="SAGRADA FAMILIA">SAGRADA FAMILIA</option>
                                  <option value="SAN CRISTOBAL">SAN CRISTOBAL</option>
                                  <option value="AZANGARO">AZANGARO</option>
                                  <option value="MIRAFLORES">MIRAFLORES</option>
                                  <option value="BOLIVIANO CUBANO">BOLIVIANO CUBANO</option>
                                  <option value="HOSPITAL SAN ROQUE">HOSPITAL SAN ROQUE</option>
                                  <option value="HOSPITAL CALCUTA">HOSPITAL CALCUTA</option>


                                </select>
                                <input type="hidden" value="0"  name="log" required>
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>

@endsection
