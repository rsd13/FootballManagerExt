


@extends('layouts.master')
@section('title', 'Configuración')
@section('content')
@include('cabecera',array('section'=>'configuracion'))
<div class="contenedor row">
      <div class="col-md-10 col-md-offset-1">
            <br>
            <div class="row">
                  <div class="col-md-3 text-center">
                        <h3>Usuarios</h3>
                        <a class="btn btn-primary btn-block" href="{{ action('UsuarioController@getForm') }}" role="button">Insertar usuario</a><br>
                        <a class="btn btn-primary btn-block" href="" role="button">Modificar/Borrar jugador</a><br>
                        <a class="btn btn-primary btn-block" href="" role="button">Modificar/Borrar entrenador</a>
                        <br>
                  </div>
                  <div class="col-md-3 text-center">
                        <h3>Equipo</h3>
                        <a class="btn btn-primary btn-block" href="{{action('EquipoController@formulario')}}" role="button">Insertar equipo</a><br>
                        <a class="btn btn-primary btn-block" href="{{action('EquipoController@editar')}}" role="button">Modificar/Borrar equipo</a>
                        <br>
                  </div>
                  <div class="col-md-3 text-center">
                        <h3>Partido</h3>

                        <a class="btn btn-primary btn-block" href="{{action('EquipoController@formulario')}}" role="button">Insertar partido</a><br>

                        <a class="btn btn-primary btn-block" href="{{action('EquipoController@editar')}}" role="button">Modificar/Borrar partido</a>
                        <br>
                  </div>
            </div>
      </div>
</div>
@endsection
