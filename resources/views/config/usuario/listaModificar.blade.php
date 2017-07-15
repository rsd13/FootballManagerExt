@extends('layouts.master')
@section('title', 'Configuración: Usuarios')
@section('content')
@include('cabecera',array('section'=>'plantilla'))
<div class="contenedor row">
      @include('config/configuracion')
      <div class="col-md-10 col-md-offset-1">
            <br><br>
            <div class="row">
                  <form action="{{ action('UsuarioController@getUsuariosUpdate') }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('POST') }}
                        <div class="form-group row">
                              <div class="col-lg-3 col-md-6 col-sm-6">
                                    <select class="form-control" name="equipo" id="equipo">
                                          <option value="Todos" @if( $equipo == 'Todos') selected @endif >Todos los equipos</option>
                                          @foreach($equipos as $unEquipo)
                                          <option value="{{ $unEquipo->id }}" @if( $equipo == $unEquipo->id) selected @endif >{{ $unEquipo->nombreEquipo }}</option>
                                          @endforeach
                                    </select>
                              </div>
                              <div class="col-lg-3 col-md-6 col-sm-6">
                                    <select class="form-control" onchange="cargoFilter()" name="rol" id="rol">
                                          <option value="0" @if($rol == 0) selected @endif>Jugadores</option>
                                          <option value="1" @if($rol == 1) selected @endif>Entrenadores</option>
                                          <option value="2" @if($rol == 2) selected @endif>Director</option>
                                          <option value="3" @if($rol == 3) selected @endif>Administradores</option>
                                    </select>
                              </div>
                              <div class="col-lg-3 col-md-6 col-sm-6">
                                    <select class="form-control" name="cargo" id="cargo">
                                          <option value="-1" @if($cargo == -1) selected @endif >Todos los cargos</option>
                                          <option value="0"  @if($cargo == 0) selected @endif >Sin cargo</option>
                                          <option value="1"  @if($cargo == 1) selected @endif >Primer capitan</option>
                                          <option value="2"  @if($cargo == 2) selected @endif >Segundo capitan</option>
                                          <option value="3"  @if($cargo == 3) selected @endif >Tercer capitan</option>
                                    </select>
                              </div>
                              <div class="col-lg-3 col-md-6 col-sm-6">
                                    <select class="form-control" name="posicion" id="posicion">
                                          <option value="0" @if($posicion == -1) selected @endif >Todas las posiciones</option>
                                          <option value="4" @if($posicion == 4) selected @endif >Delantero</option>
                                          <option value="3" @if($posicion == 3) selected @endif >Medio</option>
                                          <option value="2" @if($posicion == 2) selected @endif >Defensa</option>
                                          <option value="1" @if($posicion == 1) selected @endif >Portero</option>
                                    </select>
                              </div>
                        </div>
                        <div class="row col-lg-3 col-md-4 col-sm-4 text-center">
                              <button class="btn btn-success btn-block" type="submit">Filtrar jugadores</button>
                        </div>
                  </form>
            </div>
            <br>
            <div class="hidden-xs">{{ $usuarios->appends(['equipo' => $equipo,'rol' => $rol,'cargo' => $cargo,'posicion' => $posicion])->links() }}</div>
            @if(count($usuarios) > 0)
            <div class="row" id="jugadores">
                  @foreach($usuarios as $usuario)
                  <div class="well well-sm col-lg-2 col-md-3 col-sm-4">
                        <div class="">
                              <img class="img-responsive" src="/images/users/{{ $usuario->dni }}.png" alt="User image" onerror="this.src = '/images/users/defaultUser.png'">
                              <a href="{{ action('UsuarioController@getUsuario',$usuario->id) }}">
                                    <h4>{{ $usuario->nombre }}</h4>
                                    <h5>{{ $usuario->apellidos }}</h5>
                              </a>
                              <h6><strong>{{ $usuario->equipo->nombreEquipo or 'Administrador'}}</strong></h6>
                              <h5>{{ date('d/m/Y',strtotime($usuario->fNac)) }}  (<strong>{{ \Carbon\Carbon::now()->diffInYears($usuario->fNac) }}</strong>)</h5>
                              @if($usuario->rol == 2)
                                    <h5>Director</h5>
                              @elseif($usuario->rol == 1)
                                    <h5>
                                          @if($usuario->cargo == 1)
                                          Primer entrenador
                                          @elseif($usuario->cargo == 2)
                                          Segundo entrenador
                                          @else
                                          Becario
                                          @endif
                                    </h5>
                              @elseif($usuario->rol == 0)
                                    <h5>
                                          @if($usuario->posicion == '4')
                                          Delantero,
                                          @elseif($usuario->posicion == '3')
                                          Medio,
                                          @elseif($usuario->posicion == '2')
                                          Defensa,
                                          @elseif($usuario->posicion == '1')
                                          Portero,
                                          @else
                                          No asignado,
                                          @endif

                                          @if($equipo != 1 )
                                          Dorsal: {{ $usuario->dorsal}}
                                          @endif
                                    </h5>
                                    <h5>
                                          @if($usuario->cargo == '1')
                                          Primer capitán
                                          @elseif($usuario->cargo == '2')
                                          Segundo capitán
                                          @elseif($usuario->cargo == '3')
                                          Tercer capitán
                                          @else
                                          Sin cargo
                                          @endif
                                    </h5>
                              @endif
                              <div class="btn-group">
                                    <a href="{{ action('UsuarioController@getFormUpdate', $usuario->id) }}" class="btn btn-warning glyphicon glyphicon-pencil" role="button" title="Modificar"></a>
                                    <a href="{{ action('UsuarioController@delete', $usuario->id) }}" class="btn btn-danger glyphicon glyphicon-trash" role="button" title="Borrar"></a>
                              </div>
                        </div>
                  </div>
                  @endforeach
            </div>
            @else
            <br>
            <div class="alert alert-info">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <strong>No hay usuarios con esas caracteristicas</strong>
                  <br>
            </div>
            @endif
      </div>
</div>
<script type="text/javascript">
      function eliminarOpciones(){
            var element = document.getElementById('cargo');
            while (element.options.length>1) {
                  element.remove(1);
            }
      }

      function opcionesJugador(){
            eliminarOpciones();
            var element = document.getElementById('cargo');
            var options = ['Sin cargo','Primer capitan','Segundo capitan','Tercer capitan'];
            for (var i = 0; i < 4; i++) {
                  var option = document.createElement('option');
                  option.text = options[i];
                  option.value = i;
                  element.add(option);
            }
      }

      function opcionesEntrenador(){
            eliminarOpciones();
            var element = document.getElementById('cargo');
            var options = ['Primer entrenador','Segundo entrenador'];
            for (var i = 0; i < 2; i++) {
                  var option = document.createElement('option');
                  option.text = options[i];
                  option.value = i+1;
                  element.add(option);
            }
      }

      function cargoFilter(){
            var posicion = document.getElementById('posicion');
            posicion.disabled = true;
            var rol = document.getElementById('cargo');
            rol.disabled = true;

            var option = document.getElementById('rol').value;
            if(option == 0){
                  posicion.disabled = false;
                  rol.disabled = false;
                  opcionesJugador();
            }
            else if (option == 1) {
                  rol.disabled = false;
                  opcionesEntrenador();
            }
      }
      window.onload = cargoFilter;
</script>
@endsection
