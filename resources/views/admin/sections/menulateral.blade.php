@section('menulateral')


        <div class="col-sm-2 col-md-2 col-lg-1  sidebar">
          <ul class="nav nav-sidebar">
            <li><a href="#"><span class="glyphicon glyphicon-cloud"></span> | Escritorio <span class="sr-only">(current)</span></a></li>
            <li><a href="#">Partidos</a>
          
                           
                         
            </li>
             <li><a href="{{ URL::to('equipos') }}"><span class="glyphicon-equiposnegro"></span>| Equipos</a></li>
            <li><a href="{{ URL::to('juego') }}"><span class="glyphicon-juegonegro"></span>| Juego</a></li>
            <li><a href="#">Notificaciones</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="{{ URL::to('/campeones') }}"><span class="glyphicon-huevonegro"></span>| Campeones</a> </li>
            <li><a href="">Movimientos</a></li>
            <li><a href="">Tukis</a></li>
            <li><a href="">News</a></li>
          </ul>
          <ul class="nav nav-sidebar ">
            <li><a href=""><span class="glyphicon glyphicon-piggy-bank"></span> | Finanzas</a></li>
            <li><a href=""><span class="glyphicon glyphicon-console"></span> | Parametros</a></li>
            <li><a href="{{ URL::to('/opciones') }}"><span class="glyphicon glyphicon-cog"></span> | Opciones</a></li>
          </ul>
        </div>


@show