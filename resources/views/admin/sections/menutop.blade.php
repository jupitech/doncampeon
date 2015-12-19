@section('menutop')


       <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="logo_donc" href="#"></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Escritorio</a></li>
            <li><a href="#">Opciones</a></li>

            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"> {{ isset(Auth::user()->first_name) ? Auth::user()->first_name : Auth::user()->email }} {{ isset(Auth::user()->last_name) ? Auth::user()->last_name : Auth::user()->email }}   <span class="glyphicon glyphicon-chevron-down"></span> </a>
            <ul class="dropdown-menu entopmenu">
                        <li>
                            <div class="navbar-login">
                                <div class="row">

                                    <div class="col-lg-12">
                                        <p class="text-left"><strong>{{ isset(Auth::user()->first_name) ? Auth::user()->first_name : Auth::user()->email }} {{ isset(Auth::user()->last_name) ? Auth::user()->last_name : Auth::user()->email }}</strong></p>
                                        <p class="text-left small">{{ isset(Auth::user()->email) ? Auth::user()->email : Auth::user()->email }}</p>
                                        
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="navbar-login navbar-login-session">
                                <div class="row">
                                <div class="col-lg-6">
                                        <p>
                                            <a href="" class="btn btn-donc-enlaces">Actualizar Datos</a>
                                        </p>
                                    </div>
                                    <div class="col-lg-6">
                                        <p>
                                            <a href="{{ route('logout')}}" class="btn btn-donc-danger">Cerrar Sesion</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
             <script>
                $('.dropdown-toggle').dropdown();
             </script>
             </li>
            <li><a href="#" class="ico_grande"><span class="glyphicon glyphicon-question-sign"></span></a></li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Buscar...">
          </form>
        </div>
      </div>
    </nav>
@show