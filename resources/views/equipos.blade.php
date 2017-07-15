@extends('layouts.master')
@section('title', 'Equipos')
@section('content')
@include('cabecera',array('section'=>'equipos'))
<div class="contenedor row">
      <div class="col-md-10 col-md-offset-1">
            <h2>Equipos</h2>
            <div class="hidden-xs">{{ $lista->links() }}</div>
            <table class="table table-striped table-responsive" cellspacing="0" width="100%">
                  <thead>
                        <tr>
                              <th>Escudo</th>
                              <th>Nombre</th>
                              <th>Estadio</th>
                              <th>Capacidad</th>
                        </tr>
                  </thead>
                  <tbody>
                  @foreach($lista as $team)
                        <tr onclick="window.location.href = '{{ action('EquipoController@getEquipo',$team->id)}}';"
                              onmouseover="this.className='btn-link';" onmouseout="this.className='';">
                              <td width="70px"><img src="/images/escudos/{{$team->logo}}" alt="Escudo" width=100%></td>
                              <td>{!!$team->nombreEquipo!!}</td>
                              <td>{!!$team->estadio->nombre!!}</td>
                              <td>{!!$team->estadio->capacidad!!}</td>
                        </tr>
                    @endforeach
                  </tbody>
            </table>
            {{ $lista->links() }}
       </div>
 </div>
 @endsection>
