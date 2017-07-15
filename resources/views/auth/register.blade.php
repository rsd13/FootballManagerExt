@extends('layouts.master')
@section('title', 'Registro')
@section('content')
<div class="flex-center position-ref full-height">
      <div class="col-md-6">
            <div>
                  <img class="thumbnail img-responsive center-block" src="/images/Logo.png" alt="Logo FootballManager">
            </div>
            <div>
                  <form role="form" action="{{ route('register') }}" method="post" class="form-horizontal well well-sm">
                        {{ csrf_field() }}
                        <div class="form-group">
                              <label class="col-md-3 control-label">DNI</label>
                              <div class="col-md-9">
                                    <input id="dni" type="text" class="form-control" name="dni" value="{{ old('dni') }}" placeholder="DNI" pattern="[0-9]{8}[A-Z]" required>
                              </div>
                        </div>
                        <div class="form-group">
                              <label class="col-md-3 control-label">Nombre</label>
                              <div class="col-md-9">
                                    <input id="nombre" type="text" class="form-control" name="nombre" value="{{ old('nombre') }}" placeholder="Nombre" required>
                              </div>
                        </div>
                        <div class="form-group">
                              <label class="col-md-3 control-label">Apellidos</label>
                              <div class="col-md-9">
                                    <input id="apellidos" type="text" class="form-control" name="apellidos" value="{{ old('apellidos') }}" placeholder="Apellidos" required>
                              </div>
                        </div>
                        <div class="form-group">
                              <label class="col-sm-4 control-label">Fecha de nacimiento</label>
                              <div class="col-md-8">
                                    <input id="fNac" type="date" class="form-control" name="fNac" value="{{ old('fNac') }}" placeholder="Fecha" required>
                              </div>
                        </div>
                        <div class="form-group">
                              <label class="col-md-3 control-label">Contraseña</label>
                              <div class="col-md-9">
                                    <input id="password" type="password" class="form-control" name="password" placeholder="Contraseña" required>
                              </div>
                        </div>
                        <div class="form-group">
                              <label class="col-sm-4 control-label">Repite contraseña</label>
                              <div class="col-md-8">
                                    <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" placeholder="Contraseña" required>
                              </div>
                        </div>
                        <div class="form-group">
                              <div class="col-md-6">
                                    <a class="btn btn-primary btn-block" href="{{ action('EquipoController@getHome') }}">Volver a inicio</a>
                              </div>
                              <div class="col-md-6">
                                    <button type="submit" class="btn btn-success btn-block"> Crear cuenta </button>
                              </div>
                        </div>
                        @if(count($errors) > 0)
                        <div class="alert alert-danger">
                              <button type="button" class="close" data-dismiss="alert">&times;</button>
                              @foreach ($errors->all() as $message)
                              <strong>Error! </strong>{{$message}}
                              <br>
                              @endforeach
                        </div>
                        @endif
                  </form>

            </div>
      </div>
</div>
@endsection
