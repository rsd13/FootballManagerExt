@extends('layouts.master')
@section('title', $usuario->nombre.' '.$usuario->apellidos)
@section('content')
@include('cabecera',array('section'=>'plantilla'))


<div class="contenedor row">
@if(Auth::check() && Auth::user()->rol == 3)
<!-- Modal -->
  <div class="modal fade" id="modalConfirmacion" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">¿Estás seguro?</h4>
        </div>
        <div class="modal-body">
          <p>Estás a punto de borrar <strong>tu usuario.</strong></p>
          <p>Eso cerrará tu sesión. <strong>Para siempre.</strong></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Ya no quiero</button>
          <a action="{{ action('UsuarioController@delete', ['id' => $usuario->id]) }}" class="btn btn-danger">Sé lo que hago</a>
        </div>
      </div>

    </div>
  </div>
@endif
      <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2 toppad" >
                  <br>

                  <div class="panel panel-info">
                        <div class="panel-heading">
                              <h3 class="panel-title">Perfil</h3>
                        </div>
                        <div class="panel-body">
                              <div class="row">
                                    <div class="col-md-3 col-lg-3 " align="center">
                                          <img alt="User Pic" src="/images/users/{{$usuario->foto}}" onerror="this.src = '/images/users/defaultUser.png'" class="img-rounded img-responsive">
                                          <br>
                                          <br>
                                          <div class="col-md-8 col-md-offset-2">
                                                <button type="button" class="btn btn-block" name="button" onclick="window.history.back()"><span class="glyphicon glyphicon-arrow-left"></span> Volver</button>
                                          </div>
                                    </div>
                                    <div class="col-md-9 col-lg-9">
                                          <table class="table table-user-information">
                                                <tbody>
                                                      <tr>
                                                            <td>DNI:</td>
                                                            <td> {{ $usuario->dni }}</td>
                                                      </tr>
                                                      <tr>
                                                            <td>Nombre:</td>
                                                            <td>{{ $usuario->nombre }}</td>
                                                      </tr>
                                                      <tr>
                                                            <td>Apellidos:</td>
                                                            <td>  {{ $usuario->apellidos }}</td>
                                                      </tr>

                                                      <tr>
                                                            <td>Fecha de nacimiento:</td>
                                                            <td>   {{ date('d/m/Y',strtotime($usuario->fNac)) }} <strong>({{ \Carbon\Carbon::now()->diffInYears($usuario->fNac) }})</strong></td>
                                                      </tr>
                                                      <tr>
                                                            <td>Rol:</td>
                                                            <td>
                                                            @if($usuario->rol == 0)
                                                            Jugador
                                                            @elseif($usuario->rol == 1)
                                                            Entrenador
                                                            @elseif($usuario->rol == 2)
                                                            Director
                                                            @elseif($usuario->rol == 3)
                                                            Administrador
                                                            @endif
                                                      </td>
                                                      </tr>
                                                      @if($usuario->rol == 0)
                                                      <tr>
                                                            <td> Posición:</td>
                                                            <td>
                                                                  @if($usuario->posicion == '4')
                                                                  Delantero
                                                                  @elseif($usuario->posicion == '3')
                                                                  Medio
                                                                  @elseif($usuario->posicion == '2')
                                                                  Defensa
                                                                  @elseif($usuario->posicion == '1')
                                                                  Portero
                                                                  @else
                                                                  No asignado
                                                                  @endif

                                                            </td>
                                                      </tr>
                                                      <tr>
                                                            <td>Cargo:</td>
                                                            <td>
                                                                  @if($usuario->cargo == '1')
                                                                  Primer capitán
                                                                  @elseif($usuario->cargo == '2')
                                                                  Segundo capitán
                                                                  @elseif($usuario->cargo == '3')
                                                                  Tercer capitán
                                                                  @else
                                                                  Sin cargo
                                                                  @endif
                                                            </td>
                                                      </tr>

                                                      <tr>
                                                            <td>Dorsal:</td>
                                                            <td>{{ $usuario->dorsal }}</td>
                                                      </tr>
                                                      @elseif($usuario->rol == 1)
                                                      <tr>
                                                            <td>Cargo:</td>
                                                            <td>
                                                                  @if($usuario->cargo == '1')
                                                                  Primer entrenador
                                                                  @elseif($usuario->cargo == '2')
                                                                  Segundo entrenador
                                                                  @else
                                                                  Becario
                                                                  @endif
                                                            </td>
                                                      </tr>
                                                      @endif
                                                </tbody>
                                          </table>
                                    </div>
                              </div>
                              <div class="row">
                                    @if(Auth::check())
                                    @if(Auth::user()->id == $usuario->id or Auth::user()->rol>=1)
                                    <div class="col-md-3 col-md-offset-5 col-lg-3 col-lg-offset-5">
                                          <a href="{{ action('UsuarioController@getFormUpdate', ['id' => $usuario->id]) }}" class="btn btn-success btn-block">Editar</a>
                                    </div>
                                    @if(Auth::user()->rol>1)
                                    <div class="col-md-3 col-lg-3">
                                          @if(Auth::user()->id == $usuario->id)
                                          <button class="btn btn-danger btn-block" data-toggle="modal" data-target="#modalConfirmacion">Eliminar</a>
                                          @else
                                          <a action="{{ action('UsuarioController@delete', ['id' => $usuario->id]) }}" class="btn btn-danger">Eliminar</a>
                                          @endif

                                    </div>
                                    @endif
                                    @endif
                                    @endif
                              </div>
                        </div>

                        <div class="panel-heading">
                              <h3 class="panel-title">Equipo</h3>
                        </div>
                        <div class="panel-body">
                              <div class="row">
                                    @if( $usuario->equipo!=null and $usuario->equipo->id > 1)
                                    <div class=" col-md-9 col-lg-9 ">
                                          <table class="table table-user-information">
                                                <tbody>
                                                      <tr>
                                                            <td>Nombre:</td>
                                                            <td> {{ $usuario->equipo->nombreEquipo }}</td>
                                                      </tr>
                                                      <tr>
                                                            <td>Estadio:</td>
                                                            <td>{{ $usuario->equipo->estadio->nombre }}</td>
                                                      </tr>
                                                      <tr>
                                                            <td>Aforo:</td>
                                                            <td>{{ $usuario->equipo->estadio->capacidad }}</td>
                                                      </tr>
                                                </tbody>
                                          </table>
                                    </div>
                                    <div class="col-md-3 col-lg-3 " align="center">
                                          <img alt="User Pic" src="../{{ $usuario->equipo->logo }}" onerror="this.src = '../images/escudos/defaultTeam.png'" class="img-circle img-responsive">
                                    </div>
                                    @else
                                    <div class="text-center">
                                          <h3>Ningun equipo</h3>
                                    </div>
                                    @endif
                              </div>
                        </div>
                  </div>
            </div>
      </div>
</div>
@endsection
