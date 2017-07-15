
@extends('layouts.master')
@section('title', 'Partido')
@section('content')
@include('cabecera',array('section'=>'partidos'))

<div class="contenedor row">

	{{--@include('config/configuracion')--}}
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
	<ul class="nav nav-tabs">
		<li class="active"><a data-toggle="tab" href="#home">Información</a></li>
		<li><a data-toggle="tab" href="#menu1">Jugadores</a></li>
	</ul>

	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-4 col-lg-offset-1 col-md-offset-1 col-sm-offset-1">{{--LogoLocal--}}
				<img data-src="holder.js/10x10" alt="10x10" style="width: 60px; height: 60px;" data-holder-rendered="true" src=  "/images/escudos/{{$partido->equipoLocal->logo}}" class="img-circle img-responsive">
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-center vcenter">{{--NombreLocal--}}
				<br>
				<strong>{!!$partido->equipoLocal->nombreEquipo!!}</strong>
			</div>
			<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 text-center">{{--GolesLocal--}}
				<br>
				<strong>{!!$partido->golesLocal!!}</strong>
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 text-center">{{--GolesVisitante--}}
				<br>
				<strong>{!!$partido->golesVisitante!!}</strong>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-center">{{--NombreVisitante--}}
				<br>
				<strong>{!!$partido->equipoVisitante->nombreEquipo!!}</strong>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-4 col-lg-offset-1 col-md-offset-1 col-sm-offset-1">{{--LogoVisitante--}}
				<img data-src="holder.js/10x10" alt="10x10" style="width: 50px; height: 50px;" data-holder-rendered="true" src=  "/images/escudos/{{$partido->equipoVisitante->logo}}" class="img-circle img-responsive">
			</div>
		</div>

	</div>
	
	<div class="tab-content">
		{{-- INFORMACION --}}
		<div id="home" class="tab-pane active">
			<div class="row">
				<div class="col-lg-10 col-md-10 col-sm-10 col-lg-offset-1 col-md-offset-1 col-sm-offset-1">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-right">
						<table class="table table-user-information">
							<tbody>
								<tr class="text-right"><td>Competición:</td></tr>
								<tr class="text-right"><td>Temporada:</td></tr>
								<tr class="text-right"><td>Fecha:</td></tr>
								<tr class="text-right"><td>Estadio:</td></tr>
							</tbody>
						</table>
					</div> 
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
						<table class="table table-user-information">
							<tbody>
								<tr>
									<td>  {{ $partido->competicion->nombre }}</td>
								</tr>
								<tr>
									<td> {{ $partido->temporada->nombre }}</td>
								</tr>
								<tr>
									<td>{{ Carbon\Carbon::parse($partido->fecha)->format('d/m/Y') }}</td>
								</tr>
								<tr>
									<td>{{ $partido->estadio->nombre }}</td>
								</tr>
							</tbody>
						</table>
					</div> 
					
				</div>
			</div>


			<div class="row">
				<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 cta-contents">
					<h1 class="cta-title">Crónica</h1>
					<div class="cta-desc">
						@if($cantidad != 0)
							<PRE>{{ $partido->cronica }}</PRE>
						@else
							<p>No hay datos disponibles</p>
						@endif
					</div>
					@if(Auth::check() && Auth::user()->rol>1)
					<a title="Modificar Partido" href="{{ action('PartidoController@formularioModificar', $partido->id)}}" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
					<a title="Eliminar Partido" href="{{ action('PartidoController@eliminarPartido', $partido->id) }}"  data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
					@endif
				</div>
			</div>
	
	</div>
		{{-- JUGARORES --}}
		<div id="menu1" class="tab-pane fade">
			<div class="row form-group">

				<div class="col-lg-5 col-lg-offset-1 col-md-5 col-md-offset-1 col-sm-5 col-sm-offset-1">

					@if($cantidad != 0)
						@include('config/tablas/tableParticiparLocal')
					@else
						@include('config/tablas/tableParticiparSin')
					@endif

					@if(Auth::check() && Auth::user()->rol>1)
						<a title="Crear Jugadores y Cronica" href="{{ action('ParticiparController@formularioInsertar', $partido->id) }}" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn btn-success"><i class="glyphicon glyphicon-edit"></i></a>
						<a title="Eliminar Jugadores y Cronica" href="{{ action('ParticiparController@borrarParticipar', $partido->id) }}"  data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
						<a title="Modificar Jugadores y Cronica" href="{{ action('ParticiparController@formularioModificar', $partido->id) }}"  data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-remove"></i></a>
					@endif
				</div>

				<div class="col-lg-5 col-md-5 col-sm-5">
					@if($cantidad != 0)
						@include('config/tablas/tableParticiparVisitante')
					@else
						@include('config/tablas/tableParticiparSin')
					@endif
				</div>
			</div>
		</div>
	</div>
</div>




		


@endsection

     


