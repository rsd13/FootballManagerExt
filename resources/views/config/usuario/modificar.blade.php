@extends('layouts.master')
@section('title', $usuario->nombre.' '.$usuario->apellidos)
@section('content')
@include('cabecera',array('section'=>'plantilla'))


<div class="contenedor row">
      <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2 toppad" >
                  <br>
                  @if (count($errors) > 0)
                  <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        <strong>Error! </strong> {{ $error }}
                        @endforeach
                  </div>
                  @endif
                  <div class="panel panel-info">
                        <div class="panel-heading">
                              <h3 class="panel-title">Perfil</h3>
                        </div>
                        <div class="panel-body">
                              <div class="row">
                                    <form class="form-horizontal" action="{{ action('UsuarioController@update', $usuario->id) }}" method="POST" enctype="multipart/form-data">
                                          {{ csrf_field() }}
                                          {{ method_field('POST') }}
                                          <div class="col-md-3 col-lg-3" align="center">
                                                <div class="col-md-12 col-lg-12">
                                                      <img alt="User Pic" src="/images/users/{{$usuario->foto}}" onerror="this.src = '/images/users/defaultUser.png'" class="img-rounded img-responsive">
                                                </div>
                                                <div class="col-md-12 col-lg-12">
                                                      <input style="display:none" type="file" name="foto" id="foto" value="foto">
                                                      <br>
                                                      <input type="button" class="btn btn-primary btn-block" name="fakeFoto" onclick="document.getElementById('foto').click()" value="Elegir imagen">
                                                      <br><br>
                                                </div>
                                                <div>
                                                      <button type="button" class="btn" name="button" onclick="window.history.back()"><span class="glyphicon glyphicon-arrow-left"></span> Volver</button>
                                                </div>
                                          </div>
                                          <input type="hidden" name="equipo" id="equipo" value="{{ $usuario->equipo_id }}">
                                          <div class=" col-md-9 col-lg-9 ">
                                                <table class="table table-user-information">
                                                      <tbody>
                                                            <tr>
                                                                  <th>Datos del usuario</th>
                                                                  <th></th>
                                                            </tr>
                                                            <tr>
                                                                  <td>DNI:</td>
                                                                  <td><input class="form-control" type="text" name="dni" id="dni" value="{!! $usuario->dni !!}" required></td>
                                                            </tr>
                                                            <tr>
                                                                  <td>Nombre:</td>
                                                                  <td><input class="form-control" type="text" name="nombre" id="nombre" value="{!! $usuario->nombre !!}" required></td>
                                                            </tr>
                                                            <tr>
                                                                  <td>Apellidos:</td>
                                                                  <td><input class="form-control" type="text" name="apellidos"id="apellidos" value="{!! $usuario->apellidos !!}" required></td>
                                                            </tr>

                                                            <tr>
                                                                  <td>Fecha de nacimiento:</td>
                                                                  <td><input class="form-control" type="date" name="fNac" id="fNac" value="{{ date('Y-m-d',strtotime($usuario->fNac)) }}" required></td>
                                                            </tr>
                                                            @if(Auth::user()->rol>0)
                                                            <tr>
                                                                  <th>Trabajo en el equipo</th>
                                                                  <th></th>
                                                            </tr>
                                                            <tr id="posicionTr">
                                                                  <td> Posición:</td>
                                                                  <td>
                                                                        <div class="">
                                                                              <select class="form-control" name="posicion" id="posicion" required>
                                                                                    <option value="0" @if($usuario->posicion == 0) selected @endif>No asignado</option>
                                                                                    <option value="1" @if($usuario->posicion == 1) selected @endif>Portero</option>
                                                                                    <option value="2" @if($usuario->posicion == 2) selected @endif>Defensa</option>
                                                                                    <option value="3" @if($usuario->posicion == 3) selected @endif>Medio</option>
                                                                                    <option value="4" @if($usuario->posicion == 4) selected @endif>Delantero</option>
                                                                              </select>
                                                                        </div>
                                                                  </td>
                                                            </tr>
                                                            <tr id="cargoTr">
                                                                  <td>Cargo:</td>
                                                                  <td>
                                                                        <div class="">
                                                                              <select class="form-control" name="cargo" id="cargo" required>
                                                                                    <option value="0" @if($usuario->cargo == 0 || $usuario->cargo == null) selected @endif >Sin cargo</option>
                                                                                    <option value="1" @if($usuario->cargo == 1) selected @endif>Primer capitán</option>
                                                                                    <option value="2" @if($usuario->cargo == 2) selected @endif>Segundo capitán</option>
                                                                                    <option value="3" @if($usuario->cargo == 3) selected @endif>Tercer capitán</option>
                                                                              </select>
                                                                        </div>
                                                                  </td>
                                                            </tr>
                                                            <tr id="dorsalTr">
                                                                  <td>Dorsal:</td>
                                                                  <td>
                                                                        <div class="">
                                                                              <input class="form-control" type="number" name="dorsal" id="dorsal" min="0" value="{{ $usuario->dorsal }}">
                                                                        </div>
                                                                  </td>
                                                            </tr>
                                                            <tr>
                                                                  <td>Rol:</td>
                                                                  <td>
                                                                        <div class="">
                                                                              <select class="form-control" name="rol" id="rol" onchange="cargoFilter()" required @if(Auth::user()->rol <=1) disabled @endif>
                                                                                    <option value="0" @if($usuario->rol == 0) selected @endif>Jugador</option>
                                                                                    <option value="1" @if($usuario->rol == 1) selected @endif>Entrenador</option>
                                                                                    <option value="2" @if($usuario->rol == 2) selected @endif>Director</option>
                                                                                    <option value="3" @if($usuario->rol == 3) selected @endif>Administrador</option>
                                                                              </select>
                                                                        </div>
                                                                  </td>
                                                            </tr>

                                                            <tr>
                                                                  <td>Salario:</td>
                                                                  <td>
                                                                        <div class="">
                                                                              <input class="form-control" type="number" name="salario" id="salario" min="0" value="{{ $usuario->salario }}" required @if(Auth::user()->rol <=1) disabled @endif>
                                                                        </div>
                                                                  </td>
                                                            </tr>

                                                            <tr>
                                                                  <td>Equipo:</td>
                                                                  <td>
                                                                        <div class="">
                                                                              <select class="form-control" name="equipo_id" id="equipo_id" required @if(Auth::user()->rol <=1) disabled @endif>
                                                                                    @foreach($equipos as $equipo)
                                                                                    <option value="{{ $equipo->id }}" @if($usuario->equipo_id == $equipo->id) selected @endif>{{ $equipo->nombreEquipo }}</option>
                                                                                    @endforeach
                                                                              </select>
                                                                        </div>
                                                                  </td>
                                                            </tr>
                                                            @endif
                                                      </tbody>
                                                </table>
                                          </div>
                                          <div class="col-md-10 col-md-offset-2">
                                                <div class="form-group">
                                                      <label class="col-md-2 control-label">Contraseña</label>
                                                      <div class="col-md-5">
                                                            <input class="form-control" type="password" name="password" id="password" placeholder="Contraseña" value="">
                                                      </div>
                                                      <div class="col-md-5">
                                                            <input class="form-control" type="password" name="passwordVerify" id="passwordVerify" placeholder="Verificar contraseña" value="">
                                                      </div>
                                                </div>
                                          </div>
                                          <div class="col-md-4 col-md-offset-8">
                                                <input type="submit" class="btn btn-success btn-block" value="Editar usuario">
                                          </div>
                                    </form>
                              </div>
                        </div>
                  </div>
            </div>
      </div>
</div>
<script type="text/javascript">

function eliminarOpciones(){
      var element = document.getElementById('cargo');
      while (element.options.length != 0) {
            element.remove(0);
      }
      var pos = document.getElementById('posicion');
      while (pos.options.length != 0) {
            pos.remove(0);
      }
      var dorsal = document.getElementById('dorsal');
      dorsal.value = null;
}

function opcionesJugador(){
      eliminarOpciones();
      var cargo = document.getElementById('cargo');
      var options = ['Sin cargo','Primer capitan','Segundo capitan','Tercer capitan'];
      for (var i = 0; i < 4; i++) {
            var option = document.createElement('option');
            option.text = options[i];
            option.value = i;
            cargo.add(option);
      }
      cargo.value = @if(isset($usuario->cargo)){{ $usuario->cargo }} @else 0 @endif;

      posicion = document.getElementById('posicion');
      var options = ['Portero','Defensa','Medio','Delantero'];
      for (var i = 0; i < 4; i++) {
            var option = document.createElement('option');
            option.text = options[i];
            option.value = i+1;
            posicion.add(option);
      }
      posicion.value = @if(isset($usuario->posicion)){{ $usuario->posicion }} @else 1 @endif;

      var dorsal = document.getElementById('dorsal');
      dorsal.value = @if(isset($usuario->dorsal)){{ $usuario->dorsal }} @else 1 @endif;
}

function opcionesEntrenador(){
      eliminarOpciones();
      var cargo = document.getElementById('cargo');
      var options = ['Primer entrenador','Segundo entrenador'];
      for (var i = 0; i < 2; i++) {
            var option = document.createElement('option');
            option.text = options[i];
            option.value = i+1;
            cargo.add(option);
      }
      cargo.value = @if($usuario->cargo != 0){{ $usuario->cargo }} @else 1 @endif;
      cargo.disabled = false;

      var pos = document.getElementById('posicion');
      var option = document.createElement('option');
      option.text = "No disponible";
      option.value = null;
      pos.add(option);
}

function opcionesDirecAdmin(){
      eliminarOpciones();
      var option = document.createElement('option');
      option.text = "No disponible";
      option.value = -1;

      var element = document.getElementById('cargo');
      element.add(option);
      var pos = document.getElementById('posicion');
      pos.add(option);
}

function cargoFilter(){
      var posicionTr = document.getElementById('posicionTr');
      var posicion = document.getElementById('posicion');

      var cargoTr = document.getElementById('cargoTr');
      var cargo = document.getElementById('cargo');

      var dorsalTr = document.getElementById('dorsalTr');
      var dorsal = document.getElementById('dorsal');

      var rol = document.getElementById('rol').value;
      if(rol == 0){
            posicionTr.style.display = "";
            posicion.disabled = false;
            cargoTr.style.display = "";
            cargo.disabled = false;
            dorsalTr.style.display = "";
            dorsal.disabled = false;
            opcionesJugador();
      }
      else if (rol == 1) {
            posicionTr.style.display = "none";
            posicion.disabled = true;
            cargoTr.style.display = "";
            cargo.disabled = false;
            dorsalTr.style.display = "none";
            dorsal.disabled = true;
            opcionesEntrenador();
      }
      else{
            posicionTr.style.display = "none";
            posicion.disabled = true;
            cargoTr.style.display = "none";
            cargo.disabled = true;
            dorsalTr.style.display = "none";
            dorsal.disabled = true;
            opcionesDirecAdmin();
      }
}
window.onload = cargoFilter;
</script>
@endsection
