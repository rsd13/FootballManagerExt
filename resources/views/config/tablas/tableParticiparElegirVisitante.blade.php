 <table class="table table-striped table-responsive" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Jugador</th>
            <th>Posición</th>
            <th>Titular</th>
            <th>banquillo</th>
            <th>¿Asistencia?</th>
        </tr>
        <tbody>
        @foreach($visitantes as $visitante)
            @if($visitante->posicion != null)
            <tr>
                <th>{!!$visitante->nombre!!}</th>
                @if($visitante->posicion == 1)
                    <th>Portero</th>
                @elseif($visitante->posicion == 2)
                    <th>Defensa</th>
                @elseif($visitante->posicion == 3)
                    <th>Medio</th>
                @elseif($visitante->posicion == 4)
                    <th>Delantero</th>
                @else
                    <th></th>
                @endif
  
                <td>
                    <div class="radio">
                        <label>
                            <input type="radio" name="{!!$visitante->id!!}" id="{!!$visitante->id!!}"  value="titularVisitante {!!$visitante->id!!}" >
                        </label>
                    </div>

                </td>
                <td>
                    <div class="radio">
                        <label>
                            <input type="radio" name="{!!$visitante->id!!}"  id="{!!$visitante->id!!}"  value="banquilloVisitante {!!$visitante->id!!}" >
                        </label>
                    </div>

                </td>

                <td>
                    <div class="radio">
                        <label>
                            <input type="radio" name="{!!$visitante->id!!}"  id="titularVisitante"  value="noAsistenciaVisitante {!!$visitante->id!!}" checked>
                        </label
                    </div>

                </td>
            </tr>
            @endif
        @endforeach
        </tbody>
</table>