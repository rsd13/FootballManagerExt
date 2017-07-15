@extends('layouts.master')
@section('title', 'Inicio')
@section('content')
@include('cabecera',array('section'=>'plantilla'))

<div class="contenedor row">
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


	@include('config/configuracion')

	{{ csrf_field() }}
	{{ method_field('PUT') }}  
	<div class="row">
		 <form class="form-horizontal"  action="{{action('ParticiparController@modificarParticipar',[$partido->id])}}" method="post">
		{{ csrf_field() }}
		{{ method_field('POST') }}
                  
		<div class="col-md-6">
			<table class="table">
			<thead>
				<tr>
					<th> <img data-src="holder.js/10x10" alt="10x10" style="width: 50px; height: 50px;" data-holder-rendered="true" src=  "{{ asset ($partido->equipoLocal->logo)}}" class="img-circle img-responsive"> </th>
					<th>{!!$partido->equipoLocal->nombreEquipo!!}</th>
				</tr>
			</thead>
			
		</table>

		</div>
		<div class="col-md-6">
			<table class="table">
			<thead>
				<tr>
					<th> <img data-src="holder.js/10x10" alt="10x10" style="width: 50px; height: 50px;" data-holder-rendered="true" src=  "{{ asset ($partido->equipoVisitante->logo)}}" class="img-circle img-responsive"> </th>
					<th>{!!$partido->equipoVisitante->nombreEquipo!!}</th>
				</tr>
			</thead>
			
		</table>

		</div>

	</div>

	<div class="row">
		<div class="col-md-6">
			@include('config/tablas/tableParticiparModificarLocal')
		
		</div>
		<div class="col-md-6">
			@include('config/tablas/tableParticiparModificarVisitante')
		</div>
	
	</div>
	<div class="row form-group">
		<div class="col-md-6">
			<div class="form-group">
				<label for ="description"> Cronica</label>
					<textarea name="cronica" style="width: 500px; height: 102px ;resize: vertical;"  class="form-control" id="description" placeholder="Introduce la cronica">{!!$partido->cronica!!}</textarea>
			</div>
							
		</div>
	</div>
	

	<div class="row form-group">
		<div class="col-md-2">
			<button class="btn btn-success btn-success" type="submit">Aceptar</button>
		</div>
	</div>

</div>
@endsection

     
