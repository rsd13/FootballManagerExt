@extends('layouts.master')
@section('title', 'Crear partido')
@section('content')
@include('cabecera',array('section'=>'Inicio'))

{{-----------Código para la fecha------------------}}
<!--  jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<!-- Bootstrap Date-Picker Plugin -->
<script type="text/javascript" src="js/bootstrap-datepicker.js"></script>
<link rel="stylesheet" href="css/datepicker.css"/>
<script>
$(document).ready(function(){
      var date_input=$('input[name="date"]'); //our date input has the name "date"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
            format: 'yyyy/mm/dd',
            container: container,
            todayHighlight: true,
            autoclose: true,
      };
      date_input.datepicker(options);
})
</script>

<div class="contenedor row">
      @include('config/configuracion')
      <div class="col-md-10 col-md-offset-1">
      <h2>Modificar partido</h2>
      <br>
      {{-- Muestra errores --}}
      @if (count($errors) > 0)
            <ul>
            @foreach ($errors->all() as $error)
                  <div class="alert alert-danger">
                        <a href="#" class="alert-link">{{ $error }}</a>
                  </div>
            @endforeach
            </ul>
      @endif
        <form class="form-horizontal"  action="{{action('PartidoController@modificarPartido',[$idmodificar])}}" method="post">
                  {{ csrf_field() }}
                  {{ method_field('POST') }}

            {{-- Nombre de equipos --}}
            <div class="row form-group">
                  <div class="col-md-4">
                        <style>select:invalid { color: gray; }</style>
                        <select class="form-control" id="equipoLocal" placeholder="equipoLocal" name="equipoLocal" required>
                              <option value="Equipo" disabled selected hidden>Equipo Local</option>
                                    @foreach($equipos as $equipo)
                              <option value="{{ $equipo->id }}"> {{ $equipo->nombreEquipo }}</option>
                              @endforeach
                        </select>
                  </div>

                  <div class="col-md-4">
                        <style>select:invalid { color: gray; }</style>
                        <select class="form-control" id="equipoVisitante" placeholder="equipoVisitante" name="equipoVisitante" required>
                              <option value="Equipo" disabled selected hidden>Equipo Visitante</option>
                              @foreach($equipos as $equipo)
                              <option value="{{ $equipo->id }}"> {{ $equipo->nombreEquipo }}</option>
                              @endforeach
                        </select>
                  </div>

            </div>
             {{-- Goles y Fechas --}}
            <div class="row form-group">
                  <div class="col-md-2">
                        <input class="form-control" placeholder="Goles Local" type="text" name="golesLocal" id="golesLocal" required>
                  </div>

                  <div class="col-md-2">
                        <input class="form-control" placeholder="Goles Visitante" type="text" name="golesVisitante" id="golesVisitante" required>
                  </div>

                  <div class="col-md-4">
                        <input class="form-control" onfocus="(this.type='date')" id="fecha" name="fecha" placeholder="Fecha del partido" type="text" required/>
                  </div>
            </div>
            {{--Competiciones y Temporadas --}}
            <div class="row form-group">
                  <div class="col-md-4">
                  <style>select:invalid { color: gray; }</style>
                        <select class="form-control" id="competicion_id" placeholder="competicion_id" name="competicion_id" required>
                              <option value="Competicion" disabled selected hidden>Competicion</option>
                              @foreach($competiciones as $competicion)
                                    <option value="{{ $competicion->id }}"> {{ $competicion->nombre }}</option>
                              @endforeach
                        </select>
                  </div>


                  <div class="col-md-4">
                  <style>select:invalid { color: gray; }</style>
                        <select class="form-control" id="temporada_id" placeholder="temporada_id" name="temporada_id" required>
                              <option value="Temporada" disabled selected hidden>Temporada</option>
                              @foreach($temporadas as $temporada)
                                    <option value="{{ $temporada->id }}"> {{ $temporada->nombre }}</option>
                              @endforeach
                        </select>
                  </div>

            </div>

            <div class="row form-group">
                  <div class="col-md-2">
                        <button class="btn btn-success btn-success" type="submit">Siguiente</button>
                  </div>
            </div>
        </form>
      </div>
</div>
@endsection
