@extends('layouts.master')
@section('title', 'Inicio')
@section('content')

<div class="contenedor row">
      @include('cabecera',array('section'=>'inicio'))
      @if (count($errors) > 0)
      <br>
      <div class="col-md-6 col-md-offset-3">
            <ul>
                  @foreach ($errors->all() as $error)
                  <div class="alert alert-danger">
                        <strong>{{ $error }}</strong>
                  </div>
                  @endforeach
            </ul>
      </div>
      @else
      <div class="col-lg-offset-1 col-lg-5 col-md-5 col-md-offset-1">
            @if ($ultimoPartido == null)
            <br>
            <div class="alert alert-danger">
                  <strong> No hay datos del último partido </strong>
            </div>
            @else
            <h3>Último partido</h3>
            <div class="well row">
                  <div class="row">
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 text-center">{{--Local--}}
                              <div class="row">
                                    <img src="/images/escudos/{{ $ultimoPartido->equipoLocal->logo }}" alt="Logo equipo local" width="50px">
                              </div>
                              <div class="row">
                                    {{ $ultimoPartido->equipoLocal->nombreEquipo }}
                              </div>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 text-center">{{--Goles--}}
                              <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                    <h4>{{ $ultimoPartido->golesLocal }}</h4>
                              </div>
                              <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                    <h4>-</h4>
                              </div>
                              <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                    <h4>{{ $ultimoPartido->golesVisitante }}</h4>
                              </div>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 text-center">{{--Visitante--}}
                              <div class="row">
                                    <img src="/images/escudos/{{ $ultimoPartido->equipoVisitante->logo }}" alt="Logo equipo visitante" width="50px">
                              </div>
                              <div class="row">
                                    {{ $ultimoPartido->equipoVisitante->nombreEquipo }}
                              </div>
                        </div>
                  </div>
                  <br>
                  <div class="row text-center"><!-- Equipo Local -->
                        <div class="col-xs-6">
                              @if(count($titulares) > 0 &&count($banquillo) > 0  )
                              <table class="table table-responsive" cellspacing="0" width="100%">
                                    <thead>
                                          <tr>
                                                <th class="text-left" >Once Inicial</th>
                                          </tr>
                                    </thead>
                                    <tbody>
                                          @foreach($titulares as $titular)
                                          <tr>
                                                @if($titular->local == "si")
                                                <td class="text-left" > {!!$titular->usuario->nombre!!} </td>

                                                @endif
                                          </tr>
                                          @endforeach
                                    </tbody>
                              </table>

                              <table class="table">
                                    <thead>
                                          <tr>
                                                <th class="text-left"> Banquillo</th>
                                          </tr>
                                    </thead>
                                    <tbody>
                                          @foreach($banquillo as $b)
                                          <tr>
                                                @if($b->local == "si")
                                                <td class="text-left"> {!!$b->usuario->nombre!!} </td>

                                                @endif
                                          </tr>
                                          @endforeach
                                    </tbody>
                              </table>
                              @endif
                        </div>
                        <div class="col-xs-6 text-right"> <!-- Equipo Visitante -->
                              @if(count($titulares) > 0 &&count($banquillo) > 0  )
                              <table class="table table-responsive" cellspacing="0" width="100%">
                                    <thead>
                                          <tr>
                                                <th class="text-right" >Once Inicial</th>
                                          </tr>
                                    </thead>
                                    <tbody>
                                          @foreach($titulares as $titular)
                                          <tr>
                                                @if($titular->local == "no")
                                                <td class="text-right" > {!!$titular->usuario->nombre!!} </td>

                                                @endif
                                          </tr>
                                          @endforeach
                                    </tbody>

                              </table>

                              <table class="table">
                                    <thead>
                                          <tr>
                                                <th class="text-right"> Banquillo</th>
                                          </tr>
                                    </thead>
                                    <tbody>
                                          @foreach($banquillo as $b)
                                          <tr>
                                                @if($b->local == "no")
                                                <td class="text-right"> {!!$b->usuario->nombre!!} </td>

                                                @endif
                                          </tr>
                                          @endforeach
                                    </tbody>
                              </table>
                              @endif
                        </div>
                  </div>
                  @if(count($titulares) == 0 && count($banquillo) == 0  )
                  <div class="text-center">
                        No hay datos disponibles
                  </div>
                  @else
                  <div class="col-md-9 cta-contents">
                        <h1 class="cta-title">Crónica</h1>
                        <div class="cta-desc">
                              <PRE>{{ $ultimoPartido->cronica }}</PRE>


                        </div>
                  </div>
                  @endif
            </div>
            @endif
      </div>



      <div class="col-lg-5 col-md-4 col-xs-10 col-xs-offset-1 col-lg-offset-0">
            @if(count($ultPartidos)>0)
            <div>
                  <h3>Últimos partidos</h3>
                  <ul class="list-group">
                        @foreach($ultPartidos as $partido)
                        <li class="list-group-item row">
                              <div class="col-lg-2 col-md-12 col-sm-2 text-center">
                                    {{ date("d/m/Y",strtotime($partido->fecha)) }}
                              </div>
                              <div class="col-lg-4 col-md-12 col-sm-4 text-center">
                                    {{ $partido->equipoLocal->nombreEquipo }}
                              </div>
                              <div class="col-lg-2 col-md-12 col-sm-2 text-center">
                                    {{ $partido->golesLocal }} - {{ $partido->golesVisitante }}
                              </div>
                              <div class="col-lg-4 col-md-12 col-sm-4 text-center">
                                    {{ $partido->equipoVisitante->nombreEquipo }}
                              </div>
                        </li>
                        @endforeach
                  </ul>
            </div>
            @else
            <div class="alert alert-danger">
                  <strong> No hay datos del último partido </strong>
            </div>
            @endif
            @if(count($proxPartidos)>0)
            <div>
                  <h3>Próximos partidos</h3>
                  <ul class="list-group">
                        @foreach($proxPartidos as $partido)
                        <li class="list-group-item row">
                              <div class="col-lg-2 col-md-12 col-sm-2 text-center">
                                    {{ date("d/m/Y",strtotime($partido->fecha)) }}
                              </div>
                              <div class="col-lg-4 col-md-12 col-sm-4 text-center">
                                    {{ $partido->equipoLocal->nombreEquipo }}
                              </div>
                              <div class="col-lg-2 col-md-12 col-sm-2 text-center">
                                    -
                              </div>
                              <div class="col-lg-4 col-md-12 col-sm-4 text-center">
                                    {{ $partido->equipoVisitante->nombreEquipo }}
                              </div>
                        </li>
                        @endforeach
                  </ul>
            </div>
            @else
            <div class="alert alert-danger">
                  <strong> No hay datos de próximos partidos </strong>
            </div>
            @endif
      </div>
      @endif
</div>

@endsection
