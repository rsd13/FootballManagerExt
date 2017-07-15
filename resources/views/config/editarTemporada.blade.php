@extends('layouts.master')
@section('title', 'Configuración: Temporadas')
@section('content')
@include('cabecera',array('section'=>'partidos'))

<div class="contenedor row">
      @include('config/configuracion')
      <div class="col-md-6 col-md-offset-3">
            <h2>Temporadas</h2>

            {{-- Muestra errores --}}
            @if (count($errors) > 0)
                  <ul>
                  @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">
                              <a href="#" class="alert-link">{{ $error }}</a>
                        </div>
                  @endforeach
                  </ul>

            @elseif(count($temporadas) == 0)
                  <div class="alert alert-info">No existen temporadas.</div>
            @else
            <table class="table table-striped table-responsive" cellspacing="0" width="100%">
                  <thead>
                        <tr>
                              <th>Nombre</th>
                              <th>Inicio</th>
                              <th>Fin</th>
                              <th>Modificar</th>
                              <th>Borrar</th>
                        </tr>
                  </thead>
                  <tbody>

                        @foreach($temporadas as $temporada)
                        <tr>
                              <th>{!!$temporada->nombre!!}</th>
                              <th>{!! date('d/m/Y',strtotime($temporada->inicio)) !!}</th>
                              <th>{!! date('d/m/Y',strtotime($temporada->fin)) !!}</th>
                              <th><a  data-toggle="modal" title="Modificar Temporada" href="#editarTemporada" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a></th>
                              <th><a title="Eliminar Temporada" href="{{ action('TemporadaController@eliminarTemporada', $temporada->id)}}"  data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a></th>
                        </tr>
                        @endforeach
                  </tbody>
            </table>
      </div>
</div>
@endsection


{-- Temporada --}}
<div class="modal fade" id="editarTemporada" data-target="#editarTemporada">
      <div class="modal-dialog">

            <div class="modal-content">

                  <div class="modal-header">

                        <button class="close" data-dismiss="modal">&times;</button>
                  </div>

                  <div class="modal-body">
                        <h2> Modificar Temporada </h2>
                        <form action = "{{ action('TemporadaController@modificarTemporda', $temporada->id)}}" method="post">
                              {{ csrf_field() }}
                              {{ method_field('POST') }}
                              <div class="row form-group">
                                    <div class="col-md-6">
                                          <input class="form-control" onfocus="(this.type='date')" id="fecha" name="inicio" placeholder="Inicio de la temporada" type="text" required/>
                                    </div>
                                    <div class="col-md-6">
                                          <input class="form-control" onfocus="(this.type='date')" id="fecha" name="fin" placeholder="Fin de la temporada" type="text" required/>
                                    </div>
                              </div>
                        </div>
                        <div class="modal-footer">
                              <button class="btn btn-success btn-success" type="submit">Aceptar</button>
                        </div>
                  </form>
            </div>
      </div>
</div>
@endif
