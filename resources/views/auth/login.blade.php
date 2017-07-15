@extends('layouts.master')
@section('title', 'Login')
@section('content')
<div class="flex-center position-ref full-height">
      <div class="col-md-8">
            <div>
                  <img class="thumbnail img-responsive center-block" src="/images/Logo.png" alt="Logo FootballManager">
            </div>
            <div class="row">
                  <form role="form" action="{{ route('login') }}" method="post">
                        {{ csrf_field() }}
                        <div class="row">
                              <div class="col-md-6">
                                    <input id="dni" type="text" class="form-control" name="dni" placeholder="Usuario">
                              </div>
                              <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" placeholder="Contraseña">
                              </div>
                        </div>
                        <br>
                        <div class="row">
                              <div class="col-md-4 col-md-offset-1">
                                    <button type="submit" class="btn btn-success btn-block"> Iniciar sesión </button>
                              </div>
                              <div class="col-md-4 col-md-offset-2">
                                    <a href="{{ action('EquipoController@getHome') }}" class="btn btn-primary btn-block">Volver a inicio</a>
                              </div>
                        </div>
                  </form>
            </div>
      </div>
</div>
@endsection
