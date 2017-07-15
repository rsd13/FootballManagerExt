


{{-- for (var x=0; x < locales.length; x++) --}}
<script type="text/javascript"> 
	
	function contarSeleccionados()
	{
		var i = 1;

		var locales  = $'{$locales}';
		alert(locales)

		aux.forEach(function(a) {
    		alert(a);
		});

		for (var x=0; x < locales.length; x++){
			var aux = locales[i].id
			alert(locales[i]);
			if (document.getElementById('titularLocal aux').checked)
			{
				cant++;
			}
		}
		alert('Conoce ' + cant + ' lenguajes');
	}
</script>





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
	<form   action="{{action('ParticiparController@crearParticipar',[$partido->id])}}" method="POST">
	{{ csrf_field() }}
	{{ method_field('PUT') }}  
	<div class="row">
	
                  
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
			@include('config/tablas/tableParticiparElegirLocal')
		
		</div>
		<div class="col-md-6">
			@include('config/tablas/tableParticiparElegirVisitante')
		</div>
	
	</div>
	<div class="row form-group">
		<div class="col-md-6">
			<div class="form-group">
				<label for ="description"> Cronica</label>
				<textarea  name="cronica" style="width: 500px; height: 102px ;resize: vertical;"  class="form-control" id="description" placeholder="Enter Your Message"></textarea>
			</div>
							
		</div>
	</div>
	

	<div class="row form-group">
		<div class="col-md-2">
			<button class="btn btn-success btn-success" type="submit">Aceptar</button>
		</div>
	</div>
	</form>
</div>
@endsection

     
