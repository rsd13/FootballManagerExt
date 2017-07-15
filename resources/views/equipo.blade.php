
@extends('layouts.master')
@section('title', 'Inicio')
@section('content')
@include('cabecera',array('section'=>'plantilla'))

<div class="contenedor row">
      <br>
      @if (count($errors) > 0)
      <br>
      <div class="col-md-6 col-md-offset-3">
            <ul>
                  @foreach ($errors->all() as $error)
                  <div class="alert alert-danger">
                        <a href="#" class="alert-link">{{ $error }}</a>
                  </div>
                  @endforeach
            </ul>
      </div>
      @endif
      <div class="col-md-10 col-md-offset-1" >
            <div class="panel panel-info">
                  <div class="panel-heading">
                        <h3 class="panel-title">Perfil</h3>
                  </div>
                  <div class="panel-body">
                        <div class="row">
                              <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src=  "/images/escudos/{{$equipo->logo}}" class="img-rounded img-responsive">
                              </div>

                              <div class=" col-md-9 col-lg-9 ">
                                    <table class="table table-user-information">
                                          <tbody>
                                                <tr>
                                                      <td>Equipo:</td>
                                                      <td>  {{ $equipo->cif }}</td>
                                                </tr>
                                                <tr>
                                                      <td>Nombre:</td>
                                                      <td> {{ $equipo->nombreEquipo }}</td>
                                                </tr>
                                                <tr>
                                                      <td>Presupuesto:</td>
                                                      <td>{{ $equipo->presupuesto }}</td>
                                                </tr>

                                                <tr>
                                                      <td>Estadio</td>
                                                      <td>{{ $equipo->estadio->nombre }}</td>
                                                </tr>
                                                <tr>
                                                      <td>Capacidad</td>
                                                      <td> {{ $equipo->estadio->capacidad }}</td>
                                                </tr>
                                          </tbody>
                                    </table>
                              </div>
                        </div>
                  </div>
                  <div class="panel-footer">
                        @if(Auth::check())
                        @if(Auth::user()->rol>1)
                        <a href="{{ action('EquipoController@modificarEquipo', $equipo->id) }}" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                        @endif
                        @if(Auth::user()->rol==3)
                        <a href="{{ action('EquipoController@eliminar', $equipo->id) }}" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                        @endif
                        @endif
                  </div>
            </div>

            @if(count($equipo->director) > 0)
            <h2>Director</h2>
            <div class="row">
                  @foreach($equipo->director as $director)
                  <div class="well well-sm col-lg-2 col-md-3 col-sm-4">
                        <img class="img-responsive" src="/images/users/{{ $director->dni }}.png" alt="User image" onerror="this.src = '/images/users/defaultUser.png'">
                        <a href="{{ action('UsuarioController@getUsuario',$director->id) }}">
                              <h4>{{ $director->nombre }}</h4>
                              <h5>{{ $director->apellidos }}</h5>
                        </a>
                        <h6><strong>{{ $equipo->nombreEquipo }}</strong></h6>
                        <h5>{{ date('d/m/Y',strtotime($director->fNac)) }}  (<strong>{{ \Carbon\Carbon::now()->diffInYears($director->fNac) }}</strong>)</h5>
                  </div>
                  @endforeach
            </div>
            @else
            <br>
            <div class="alert alert-info">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <strong>Este equipo no tiene director</strong>
                  <br>
            </div>
            @endif


            @if(count($equipo->entrenadores) > 0)
            <h2>Entrenadores</h2>
            <div class="row">

                  @foreach($equipo->entrenadores as $entrenador)
                  <div class="well well-sm col-lg-2 col-md-3 col-sm-4">
                        <img class="img-responsive" src="/images/users/{{ $entrenador->dni }}.png" alt="User image" onerror="this.src = '/images/users/defaultUser.png'">
                        <a href="{{ action('UsuarioController@getUsuario',$entrenador->id) }}">
                              <h4>{{ $entrenador->nombre }}</h4>
                              <h5>{{ $entrenador->apellidos }}</h5>
                        </a>
                        <h6><strong>{{ $equipo->nombreEquipo }}</strong></h6>
                        <h5>{{ date('d/m/Y',strtotime($entrenador->fNac)) }}  (<strong>{{ \Carbon\Carbon::now()->diffInYears($entrenador->fNac) }}</strong>)</h5>
                        <h5>
                              @if($entrenador->cargo == 1)
                              Primer entrenador
                              @elseif($entrenador->cargo == 2)
                              Segundo entrenador
                              @else
                              Becario
                              @endif
                        </h5>

                  </div>
                  @endforeach
            </div>
            @else
            <br>
            <div class="alert alert-info">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <strong>Este equipo no tiene entrenadores</strong>
                  <br>
            </div>
            @endif

            @if(count($equipo->jugadores) > 0)
            <div class="row" id="jugadores">
                  <h2>Jugadores</h2>
                  @foreach($equipo->jugadores as $jugador)
                  <div class="well well-sm col-lg-2 col-md-3 col-sm-4">
                        <div class="">
                              <img class="img-responsive" src="/images/users/{{ $jugador->dni }}.png" alt="User image" onerror="this.src = '/images/users/defaultUser.png'">
                              <a href="{{ action('UsuarioController@getUsuario',$jugador->id) }}">
                                    <h4>{{ $jugador->nombre }}</h4>
                                    <h5>{{ $jugador->apellidos }}</h5>
                              </a>
                              <h6><strong>{{ $equipo->nombreEquipo or 'Administrador'}}</strong></h6>
                              <h5>{{ date('d/m/Y',strtotime($jugador->fNac)) }}  (<strong>{{ \Carbon\Carbon::now()->diffInYears($jugador->fNac) }}</strong>)</h5>
                              <h5>
                                    @if($jugador->posicion == 4)
                                    Delantero
                                    @elseif($jugador->posicion == 3)
                                    Medio
                                    @elseif($jugador->posicion == 2)
                                    Defensa
                                    @elseif($jugador->posicion == 1)
                                    Portero
                                    @else
                                    No asignado
                                    @endif
                              </h5>
                              <h5>
                                    @if($jugador->cargo == 1)
                                    Primer capitán
                                    @elseif($jugador->cargo == 2)
                                    Segundo capitán
                                    @elseif($jugador->cargo == 3)
                                    Tercer capitán
                                    @else
                                    Sin cargo
                                    @endif
                              </h5>
                              <h5>
                                    Dorsal: {{ $jugador->dorsal }}
                              </h5>
                        </div>
                  </div>
                  @endforeach
            </div>
            @else
            <br>
            <div class="alert alert-info">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <strong>Este Equipo no tiene jugadores</strong>
                  <br>
            </div>
            @endif
      </div>
</div>
@endsection
