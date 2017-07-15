@extends('layouts.master')
@section('title', 'Partidos')
@section('content')
@include('cabecera',array('section'=>'partidos'))
<div class="contenedor row">
      <div class="col-md-10 col-md-offset-1">
            <h2>Partidos <a href="#filtros" class="btn btn-info" data-toggle="collapse">Filtrar</a></h2>
            <!--Parte del filtro-->
            <div class="row collapse" id="filtros">
                  <form action="{{ action('PartidoController@getPartidos') }}" method="POST" name="filtro">
                        {{ csrf_field() }}
                        {{ method_field('POST') }}
                        <div class="form-group row">
                              <div class="col-lg-5 col-md-5 col-sm-5 col-xs-6">
                                    <select class="form-control" onchange="mostrarOcultar()" name="equipo1" id="equipo1">
                                          <option value="Todos">Equipos: Todos</option>
                                          @foreach($equipos as $unEquipo)
                                          <option value="{{ $unEquipo->id }}" @if($unEquipo->id == $equipo1) selected @endif>
                                          {{ $unEquipo->nombreEquipo }}</option>
                                          @endforeach
                                    </select>
                              </div>
                              <div class="col-lg-2 col-md-2 col-sm-2 hidden-xs text-center"><img src="{{ asset('images/Vs.png')}}" alt="Versus" width="30px"></div>
                              <div class="col-lg-5 col-md-5 col-sm-5 col-xs-6">
                                    <select class="form-control" onchange="mostrarOcultar()" name="equipo2" id="equipo2">
                                          <option value="Todos">Equipos: Todos</option>
                                          @foreach($equipos as $unEquipo)
                                          <option value="{{ $unEquipo->id }}" @if($unEquipo->id == $equipo2) selected @endif>
                                          {{ $unEquipo->nombreEquipo }}</option>
                                          @endforeach
                                    </select>
                              </div>
                        </div>
                        <div class="form-group row">
                              <div class="col-lg-4 col-md-4 col-sm-5 col-xs-6">
                                    <select class="form-control" onchange="mostrarOcultar()" name="temporada" id="temporada">
                                          <option value="Todas">Temporadas: Todas</option>
                                          @foreach($temporadas as $unaTemporada)
                                          <option value="{{ $unaTemporada->id }}" @if($unaTemporada->id == $temporada) selected @endif>
                                          Temporada {{ $unaTemporada->nombre }}</option>
                                          @endforeach
                                    </select>
                              </div>
                              <div class="col-lg-4 col-md-4 col-sm-5 col-xs-6">
                                    <select class="form-control" onchange="mostrarOcultar()" name="competicion" id="competicion">
                                          <option value="Todas">Competición: Todas</option>
                                          @foreach($competiciones as $unaCompeticion)
                                          <option value="{{ $unaCompeticion->id }}" @if($unaCompeticion->id == $competicion) selected @endif>
                                          {{ $unaCompeticion->nombre }}</option>
                                          @endforeach
                                    </select>
                              </div>
                                    <div class="col-lg-3 col-md-4 col-sm-5 text-center" style="display: none">
                                          <input class="form-control" type="number" name="results" id="results">
                                    </div>
                              <div class="col-lg-3 col-md-4 col-sm-2 text-center hidden-xs">
                                    <button class="btn btn-success btn-block" type="submit">Filtrar</button>
                              </div>
                        </div>
                        <div class="row visible-xs">
                                    <button class="btn btn-success btn-block" type="submit">Filtrar</button>
                              </div>
                  </form>
            </div>
            <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8 hidden-xs">
                  {{$partidos->appends(['equipo1' => $equipo1, 'equipo2' => $equipo2,'temporada' => $temporada,'competicion' => $competicion,'results'=>$results])->links()}}
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <br class="hidden-xs">
            @if($partidos->count() > 0)
                  <select class="form-control" name="resultsNumber" id="resultsNumber" onchange="cambiarPaginacion()">
                        <option value=5 @if($results == 5) selected @endif>5 resultados por página</option>
                        <option value=10 @if($results == 10) selected @endif>10 resultados por página</option>
                        <option value=15 @if($results == 15 || $results == null) selected @endif>15 resultados por página</option>
                        <option value=30 @if($results == 30) selected @endif>30 resultados por página</option>
                        <option value=50 @if($results == 50) selected @endif>50 resultados por página</option>
                  </select>
                  @endif
            </div>

            </div>

            @if($partidos->count() > 0)
            <table class="table table-striped table-responsive" cellspacing="0" width="100%">
                  <thead>
                        <tr>
                              <th class="text-center">Estadio</th>
                              <th class="visible-lg">Esc</th>
                              <th class="text-center">Local</th>
                              <th class="text-center">Resultado</th>
                              <th class="text-center">Visitante</th>
                              <th class="visible-lg">Esc</th>
                              <th>Fecha</th>
                              <th class="text-center hidden-xs">Temporada</th>
                              <th class="text-center hidden-xs">Competición</th>


                        </tr>

                  <tbody>
                   @foreach($partidos as $partido)
                    <tr onclick="window.location.href = '{{ action('PartidoController@getPartido', $partido->id)}}';"
                        onmouseover="this.className='btn-link';" onmouseout="this.className='';">
                        <td class="text-center">{!!$partido->estadio->nombre!!}</td>
                        <td class="visible-lg" width="70px"><img src="/images/escudos/{{$partido->equipoLocal->logo}}" alt="Escudo" width=100%></td>
                        <td>{!!$partido->equipoLocal->nombreEquipo!!}</td>
                        <td class="text-center">{!!$partido->golesLocal!!} - {!!$partido->golesVisitante!!}</td>
                        <td class="text-right">{!!$partido->equipoVisitante->nombreEquipo!!}</td>
                        <td class="visible-lg" width="70px"><img src="/images/escudos/{{$partido->equipovisitante->logo}}" alt="Escudo" width=100%></td>
                        <td>{{strftime('%d/%b',strtotime($partido->fecha)) }}</td>
                        <td class="hidden-xs">{!!$partido->temporada->nombre!!}</td>
                        <td class="hidden-xs">{!!$partido->competicion->nombre!!}</td>
                    </tr>
                    @endforeach
                  </tbody>
            </table>
            {{$partidos->appends(['equipo1' => $equipo1, 'equipo2' => $equipo2,'temporada' => $temporada,'competicion' => $competicion,'results'=>$results])->links()}}
            @else
            <div class="alert alert-info">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <strong>
                  @if($equipo1 == 'Todos')
                     No hay partidos así, prueba con otro filtro.
                     <br>
                     Sino siempre puedes <a href="javascript:restablecerFiltro()">restablecer el filtro</a>.
                  @elseif($equipo1 == 1)
                     Los jugadores libres no pueden disputar partidos.
                     <br>Si te has equivocado, prueba otra cosa o <a href="javascript:restablecerFiltro()">restablece el filtro</a>.
                  @else
                     Un equipo nunca jugará contra sí mismo, y lo sabes.
                     <br>
                     Si querías ver los partidos jugados, sólo deja la primera opción. Lo tenemos pensado para que salgan todos sus partidos, tanto de local como de visitante, así que don't worry.
                     <br>Si te has equivocado, prueba otra cosa o <a href="javascript:restablecerFiltro()">restablece el filtro</a>.
                  </strong>
                  @endif
                  <br>

            </div>
            @endif
       </div>
 </div>
<script type="text/javascript">
      function mostrarOcultar(){
            var equipo1 = document.getElementById('equipo1');
            var equipo2 = document.getElementById('equipo2');
            var temp    = document.getElementById('temporada');
            var comp    = document.getElementById('competicion');

            if(equipo1.value == 'Todos'){
                  equipo1.className = "form-control";
                  equipo2.disabled = true;
                  equipo2.className = "form-control";
                  equipo2.value = 'Todos';
                  temp.disabled = false;
                  comp.disabled = false;
            }
            else {
                  equipo1.className += " btn-info";
                  equipo2.disabled = false;
                  if(equipo2.value != 'Todos')equipo2.className += " btn-info";
                  temp.disabled = true;
                  comp.disabled = true;
                  temp.value = 'Todas';
                  comp.value = 'Todas';
            }
            if(temp.value != 'Todas') temp.className += " btn-info";
            else temp.className = "form-control";
            if(comp.value != 'Todas') comp.className += " btn-info";
            else comp.className = "form-control";
      }
      function restablecerFiltro(){
            var equipo1 = document.getElementById('equipo1');
            equipo1.value = 'Todos';
            var equipo2 = document.getElementById('equipo2');
            equipo2.value = 'Todos';
            var temporada = document.getElementById('temporada');
            temporada.value = 'Todas';
            var competicion = document.getElementById('competicion');
            competicion.value = 'Todas';
            document.filtro.submit();
      }
      function cambiarPaginacion(){
            var resultsNumber = document.getElementById('resultsNumber');
            var results = document.getElementById('results');
            results.value = resultsNumber.value;
            document.filtro.submit();
      }
      function paginacionInicio(){
            var resultsNumber = document.getElementById('resultsNumber');
            var results = document.getElementById('results');
            results.value = resultsNumber.value;
      }
      window.onload = mostrarOcultar,paginacionInicio;

</script>
@endsection
