@extends('layouts.master')
@section('title', 'Configuración: Equipos')
@section('content')
@include('cabecera',array('section'=>'equipos'))
<div class="contenedor row">
	@include('config/configuracion')
	<div class="col-md-10 col-md-offset-1">
		<h2>Todos los equipos</h2>
		<!--Tamaño actual: <p class="visible-lg">lg</p><p class="visible-sm">sm</p><p class="visible-md">md</p><p class="visible-xs">xs</p>-->
		@if(count($errors) > 0)
            <div class="alert alert-danger">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  @foreach ($errors->all() as $message)
                  <strong>Error! </strong>{{$message}}
                  <br>
                  @endforeach
            </div>
            @endif
		@if(count($lista) == 0)
		<div class="alert alert-info">No existen equipos.</div>
		@else
		<div class="">
			{{$lista->links() }}
			<table class="table table-striped table-responsive" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th class="hidden-xs">CIF</th>
						<th>Escudo</th>
						<th>Nombre</th>
						<th class="visible-lg">Presupuesto</th>
						<th>Estadio</th>
						<th>Capacidad</th>
						<th class="hidden-xs">Patrocinador</th>
						<th class="text-center">Acciones</th>
					</tr>
				</thead>
				<tbody>
					@foreach($lista as $team)
					<tr onclick="window.location.href = '{{ action('EquipoController@getEquipo',$team->id)}}';"
						onmouseover="this.className='btn-link';" onmouseout="this.className='';">
						<td class="hidden-xs">{!!$team->cif!!}</td>
						<td width="70px"><img src="/images/escudos/{{$team->logo}}" alt="Escudo" width=100%></td>
						<td>{!!$team->nombreEquipo!!}</td>
						@if ($team->cif == 'A27417476' || $team->presupuesto != 0)
						<td class="visible-lg">{!!$team->presupuesto!!}</td>
						@else
						<td class="visible-lg">Desconocido</td>
						@endif
						<td>{!!$team->estadio->nombre!!}</td>
						<td>{!!$team->estadio->capacidad!!}</td>
						<td class="hidden-xs">{!!$team->patrocinador->nombre!!}</td>
						<td>
							<div class="btn-group ">
								<a href="{{ action('EquipoController@modificarEquipo', $team->id) }}"
									class="btn btn-warning btn-block btn-sm  glyphicon glyphicon-pencil"
									role="button" title="Modificar">
								</a>
								<a  href="{{ action('EquipoController@eliminar', $team->id) }}"
									class="btn btn-danger btn-block glyphicon glyphicon-trash"
									role="button" title="Borrar">
								</a>
							</div>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		@endif
	</div>
</div>
@endsection
