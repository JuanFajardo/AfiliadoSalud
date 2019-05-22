@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">UserName</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Nombre Completo</label>
                            <div class="col-md-6">
                                <input id="" type="text" class="form-control" name="email" value="{{ old('email') }}" required>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('salud') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Centro de Salud</label>
                            <div class="col-md-6">
                                <select name="salud" id="salud">
                                  
                                  <option value="CBES">ASEGURADOS A LA CAJA BANCARIA ESTATAL DE SALUD</option>
                                  <option value="CPS">ASEGURADOS A LA CAJA PETROLERA DE SALUD</option>
                                  <option value="CSBP">ASEGURADOS A LA CAJA DE SALUD DE LA BANCA PRIVADA</option>
                                  <option value="CSC">ASEGURADOS A LA CAJA DE SALUD DE CAMINOS</option>
                                  <option value="CNS">ASEGURADOS A LA CAJA NACIONAL DE SALUD</option>
                                  <option value="CORDES">ASEGURADOS A LA CAJA DE SALUD CORDES</option>
                                  <option value="COSSMIL">CORPORACION DEL SEGURO SOCIAL MILITAR</option>
                                  <option value="SSU">ASEGURADOS A LA SEGURIDAD SOCIAL UNIVERSITARIA</option>

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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection