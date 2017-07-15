<nav class="barraNav navbar navbar-default navbar-fixed-top">
      <div class="container">
            <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"  aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                  </button>
                  <a href="{{action('EquipoController@getHome')}}" class="navbar-brand pull-left"><img src="/images/Logo.png" alt="Imagen del escudo"></a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                  <ul class="nav navbar-nav">
                        <li class="divider" role="separator"></li>
                        <li @if($section == "inicio") class="active" @endif ><a href="{{action('EquipoController@getHome')}}">Inicio</a></li>
                        <li @if($section == "partidos") class="active" @endif ><a href="{{action('PartidoController@getPartidos')}}">Partidos</a></li>
                        <li @if($section == "plantilla") class="active" @endif ><a href="{{action('UsuarioController@getUsuarios')}}">Plantilla</a></li>
                        <li @if($section == "equipos") class="active" @endif ><a href="{{action('EquipoController@getEquipos')}}">Equipos</a></li>
                  </ul>
                  <ul class="nav navbar-nav navbar-right">
                        @if(Auth::check())

                        <li class="dropdown @if($section == 'configuracion') active @endif">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->nombre }} <span class="caret"></span></a>
                              <ul class="dropdown-menu">
                                    <li><a href="{{action('UsuarioController@getUsuario',Auth::user()->id)}}">Mi perfil</a></li>
                                    @if(Auth::check())
                                    @if(Auth::user()->rol>0)
                                    <li><a href="{{action('EquipoController@editar')}}">Configuración</a></li>
                                    @endif
                                    @endif
                                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar sesión</a></li>
                              </ul>
                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                              </form>
                        </li>
                        @else
                        <li><a href="{{ route('login') }}">Entrar</a></li>
                        <li><a href="{{ route('register') }}">Registrarse</a></li>
                        @endif
                        <li class="divider" role="separator"></li>
                  </ul>
            </div>
      </div>
</nav>
