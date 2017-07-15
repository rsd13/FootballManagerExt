<table class="table"> 
    <thead> 
    <tr> 
        <th>Once Inicial</th> 
        <th>Posición</th> 
    </tr> 
</thead> 
    <tbody> 
        @foreach($titulares as $titular)
        <tr> 
            @if($titular->local == "no") 
                <th> {!!$titular->usuario->nombre!!} </th> 
                @if($titular->usuario->posicion == 1) 
                    <td>Portero</td> 
                @elseif($titular->usuario->posicion == 2) 
                    <td>Defensa</ttdh> 
                @elseif($titular->usuario->posicion == 3) 
                    <td>Medio</td> 
                @elseif($titular->usuario->posicion == 4) 
                    <td>Delantero</td> 
                @else 
                    <th></th> 
                @endif 
            @endif 
        </tr> 
         @endforeach
    </tbody> 
</table>



<table class="table"> 
    <thead> 
    <tr> 
        <th>Banquillo</th> 
        <th>Posición</th> 
    </tr> 
</thead> 
    <tbody> 
        @foreach($banquillo as $b)
        <tr> 
            @if($b->local == "no") 
                <th> {!!$b->usuario->nombre!!} </th> 
                @if($b->usuario->posicion == 1) 
                    <td>Portero</td> 
                @elseif($b->usuario->posicion == 2) 
                    <td>Defensa</ttdh> 
                @elseif($b->usuario->posicion == 3) 
                    <td>Medio</td> 
                @elseif($b->usuario->posicion == 4) 
                    <td>Delantero</td> 
                @else 
                    <th></th> 
                @endif 
            @endif 
        </tr> 
         @endforeach
    </tbody> 
</table>
