
<nav class="navbar navbar-default sidebar" role="navigation" >
      <div class="container-fluid">
            <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                  </button>
      </div>
      <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
            <ul class="nav navbar-nav">
                  <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> Usuarios <span class="caret"></span></a>
                        <ul class="dropdown-menu forAnimate" role="menu">
                              <li><a href="{{action('UsuarioController@getFormCreate')}}">Crear</a> </li>
                              <li><a href="{{action('UsuarioController@getUsuariosUpdate')}}">Modificar</a></li>
                        </ul>
                  </li>
                  <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-time"></span> Partidos <span class="caret"></span></a>
                        <ul class="dropdown-menu forAnimate" role="menu">
                              <li><a href="{{action('PartidoController@formularioInsertar')}}">Crear</a> </li>
                              <li><a href="{{action('PartidoController@editarPartidos')}}">Modificar</a></li>
                        </ul>
                  </li>
                  @if(Auth::check() and Auth::user()->rol > 2)
                  <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-th"></span> Equipos <span class="caret"></span></a>
                        <ul class="dropdown-menu forAnimate" role="menu">
                              <li><a href="{{action('EquipoController@formulario')}}">Crear</a> </li>
                              <li><a href="{{action('EquipoController@editar')}}">Modificar</a></li>
                        </ul>
                  </li>
                  <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon  glyphicon-th-list"></span> Competiciones <span class="caret"></span></a>
                        <ul class="dropdown-menu forAnimate" role="menu">
                              <li><a href="#consumergoods" data-toggle="modal">Crear</a></li>
                              <li><a href="{{action('CompeticionController@editar')}}">Modificar</a></li>
                        </ul>
                  </li>
                  </li>
                  <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-calendar"></span> Temporada <span class="caret"></span></a>
                        <ul class="dropdown-menu forAnimate" role="menu">
                              <li><a href="#creartemporada" data-toggle="modal">Crear</a></li>
                              <li><a href="{{action('TemporadaController@editar')}}">Modificar</a></li>
                        </ul>
                  </li>
                  @endif
            </ul>
      </div>
</nav>



{{-- Competicion --}}
<div class="modal fade" id="consumergoods" data-target="#consumergoods">
      <div class="modal-dialog">

            <div class="modal-content">
                  <div class="modal-header">
                        <button class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                        <h2>Añadir una competición</h2>
                        <form action="{{action('CompeticionController@crearCompeticion')}}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                              <div class="form-group">
                                    <label for="Username">Nombre</label>
                                    <input class="form-control"  type="text" name="nombre" id="nombre" required>
                              </div>
                        </div>
                        <div class="modal-footer">
                              <button class="btn btn-success btn-success" type="submit">Aceptar</button>
                        </div>
                  </form>
            </div>
      </div>
</div>


{{-- Temporada --}}
<div class="modal fade" id="creartemporada" data-target="#creartemporada">
      <div class="modal-dialog">

            <div class="modal-content">

                  <div class="modal-header">

                        <button class="close" data-dismiss="modal">&times;</button>
                  </div>

                  <div class="modal-body">
                        <h2> Crear Temporada </h2>
                         <form action="{{action('TemporadaController@crearTemporada')}}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
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
