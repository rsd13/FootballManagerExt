@extends('layouts.master')
@section('title', 'Perfil de usuario')
@section('content')
@include('cabecera',array('section'=>'plantilla'))
{{-----------Código para la fecha------------------}}
<!--  jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
{{--Mostrar/ocultar--}}
<script language="JavaScript">
  function mostrarJugador(obj) {
      jugador.style.visibility = 'visible';
      entrenador.style.visibility = 'hidden';
  }
  function mostrarEntrenador(obj) {
      jugador.style.visibility = 'hidden';
      entrenador.style.visibility = 'visible';
  }  
</script>
{{------------------------------------------------}}
<div class="contenedor row">
      <div class="col-md-10 col-md-offset-1">
      <h2>Crear un usuario</h2>
            <!-- Errores -->
            @if (count($errors) > 0)
            <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            @foreach ($errors->all() as $message)
                  <strong>{{$message}}</strong>
                  <br>
            @endforeach
            </div>
            @endif
            <!-- Fin errores-->
            <form action="{{action('UsuarioController@crearModificarUsuario')}}" method="POST">
                  {{ csrf_field() }}
                  {{ method_field('POST') }}

                  {{--Elementos: dni, nombre, apellidos, fNac, salario, posicion, rol, cargo, dorsal, equipo_id, password--}}
                  <div class="row form-group">
                        <div class="col-md-3">
                              <input class="form-control" placeholder="DNI" type="text" name="dni" value="{{ old('dni') }}" id="dni" required>
                        </div>
                        <div class="col-md-4">
                              <input class="form-control" placeholder="Nombre" type="text" name="nombre" value="{{ old('nombre') }}" id="nombre" required>
                        </div>
                        <div class="col-md-5">
                              <input class="form-control" placeholder="Apellidos" type="text" name="apellidos" value="{{ old('apellidos') }}" id="apellidos" required>
                        </div>
                  </div>
                  <div class="row form-group">
                        <div class="col-md-3">
                              {{--Fecha de nacimiento--}}
                              <input class="form-control" id="fNac" name="date" value="{{ old('date') }}" placeholder="Nacido el" type="text" onfocus="(this.type='date')" required/>
                              
                        </div>
                        <!--<div class="col-md-4">
                              <input class="form-control" placeholder="Contraseña"type="password" name="contraseña" id="contrasena">
                        </div>-->
                        <div class="col-md-3">
                              <input class="form-control" placeholder="Salario (€)" type="number" name="salario" value="{{ old('salario') }}" id="salario" required>
                        </div>
                        
                        
                  </div>
                  <div class="row form-group">
                        <div class="col-md-5">
                              {{--Equipo--}}
                              <style>select:invalid { color: gray; }</style>
                              <select class="form-control" id="equipo" placeholder="Equipo" name="equipo" required>
                                    <option value="Equipo" disabled selected hidden>Equipo</option>
                                    @foreach($listaEquipos as $equipo)
                                          @if(old('equipo')==$equipo->id)
                                                <option value="{{ $equipo->id }}" selected> {{ $equipo->nombreEquipo }}</option>
                                          @else
                                                <option value="{{ $equipo->id }}"> {{ $equipo->nombreEquipo }}</option>
                                          @endif
                                    @endforeach
                              </select>
                        </div>                       
                  </div>
                  {{--Selección de rol --}}
                  <fieldset class="form-group">
                    <legend>Rol del usuario</legend>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios1" value="jugador" onClick="mostrarJugador(this)">
                        Quiero crear un jugador
                      </label>
                    </div>
                    <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios2" value="entrenador" onClick="mostrarEntrenador(this)">
                        Quiero crear un entrenador
                      </label>
                    </div>
                  </fieldset>


                  {{--Parte de jugador--}}
                  <div class="row form-group" style="visibility:hidden" name="jugador" id="jugador">{{--Así se oculta o muestra--}}
                    <div class="col-md-2">
                          {{--Posición--}}
                          <style>select:invalid { color: gray; }</style>
                          <select class="form-control" id="posicion" name="posicion" value="{{ old('posicion') }}" required>
                                <option value="Posicion" disabled selected hidden>Posición</option>
                                <option value="Delantero">Delantero</option>
                                <option value="Medio">Medio</option>
                                <option value="Defensa">Defensa</option>
                                <option value="Portero">Portero</option>
                          </select>
                    </div>
                    <div class="col-md-3">
                          {{--Cargo--}}
                          <style>select:invalid { color: gray; }</style>
                          <select class="form-control" id="cargo" name="cargo" value="{{ old('cargo') }}" required>
                                <option value="0" selected>No capitan</option>
                                <option value="1">Primer capitan</option>
                                <option value="2">Segundo capitan</option>
                                <option value="3">Tercer capitan</option>
                          </select>
                    </div>
                    <div class="col-md-3">
                              {{--Dorsal--}}
                              <input class="form-control" placeholder="Dorsal" type="number" name="dorsal" id="dorsal" value="{{ old('dorsal') }}" required>
                        </div>
                </div>
                {{-----------------------}}
                {{--Parte de entrenador--}}
                <div class="row form-group" style="visibility:hidden" name="entrenador" id="entrenador">{{--Así se oculta o muestra--}}
                    <div class="col-md-3">
                          {{--Cargo--}}
                          <style>select:invalid { color: gray; }</style>
                          <select class="form-control" id="cargo" name="cargo" value="{{ old('cargo') }}" required>
                                <option value="1" selected>Primer entrenador</option>
                                <option value="2">Segundo entrenador</option>
                          </select>
                    </div>
                </div>

                {{-----------------------}}
                <div class="form-footer">
                        <button class="btn btn-success btn-block" type="submit">Crear usuario</button>
                  </div>
            </form>
      </div>
</div>
@endsection