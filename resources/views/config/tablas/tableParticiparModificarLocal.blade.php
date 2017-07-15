 <table class="table table-striped table-responsive" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Jugador</th>
            <th>Posición</th>
            <th>Titular</th>
            <th>banquillo</th>

        </tr>
        <tbody>
        @foreach($jugadores as $jugador)
            @if($jugador->local == "si")
                @if($jugador->usuario->posicion != null)
                <tr>
                    <th>{!!$jugador->usuario->nombre!!}</th>
                    @if($jugador->usuario->posicion == 1)
                        <th>Portero</th>
                    @elseif($jugador->usuario->posicion == 2)
                        <th>Defensa</th>
                    @elseif($jugador->usuario->posicion == 3)
                        <th>Medio</th>
                    @elseif($jugador->usuario->posicion == 4)
                        <th>Delantero</th>
                    @else
                        <th></th>
                    @endif
                

                    <td>
                        <div class="radio">
                            <label>
                                <input type="radio" name="{!!$jugador->usuario->id!!}" id="titularLocal {!!$jugador->usuario->id!!}"  value="titularLocal {!!$jugador->usuario->id!!}" 
                                @if($jugador->asistencia == 1) checked @endif>
                            </label>
                        </div>

                    </td>
                    <td>
                        <div class="radio">
                            <label>
                                <input type="radio" name="{!!$jugador->usuario->id!!}" id="titularLocal {!!$jugador->usuario->id!!}"  value="banquilloLocal {!!$jugador->usuario->id!!}" 
                                @if($jugador->asistencia == 2) checked @endif  >
                            </label>
                        </div>
                    </td>

                    <td>
                        <div class="radio">
                            <label>
                                <input type="radio" name="{!!$jugador->usuario->id!!}"  id="titularVisitante"  value="noAsistenciaLocal {!!$jugador->usuario->id!!}" 
                                @if($jugador->asistencia == 0) checked @endif >
                            </label>
                        </div>
                    </td>
                </tr>
                @endif
            @endif
        @endforeach
        </tbody>
</table>