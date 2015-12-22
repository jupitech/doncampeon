@section('menulateral')


        <div class="col-sm-2 col-md-1 sidebar">
          <ul class="nav nav-sidebar">
            <li><a href="#"><span class="glyphicon glyphicon-cloud"></span> | Escritorio <span class="sr-only">(current)</span></a></li>
            <li><a href="#">Partidos</a>
          
                           
                         
            </li>
             <li><a href="{{ URL::to('equipos') }}">Equipos</a></li>
            <li><a href="#">Juego</a></li>
            <li><a href="#">Notificaciones</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="">Campeones</a> </li>
            <li><a href="">Movimientos</a></li>
            <li><a href="">Tukis</a></li>
            <li><a href="">News</a></li>
          </ul>
          <ul class="nav nav-sidebar ">
            <li><a href=""><span class="glyphicon glyphicon-piggy-bank"></span> | Finanzas</a></li>
            <li><a href=""><span class="glyphicon glyphicon-console"></span> | Parametros</a></li>
            <li><a href=""><span class="glyphicon glyphicon-cog"></span> | Opciones</a></li>
          </ul>
        </div>


@show