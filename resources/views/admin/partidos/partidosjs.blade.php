@extends('admin/layout')

@section('content')
 @include('admin.sections.menuequipos')

		<div class="col-sm-12" ng-controller="PartidosCtrl">
      			<h1 class="page-header">
      				 <div class="col-sm-6 spi spd">
		                  Partidos
		             </div>
		              <div class="col-sm-6 spi spd">
			               <div class="lbotones">
			                  <a  type="button" class="btn btn-donc-nuevo" aria-label="Left Align" ng-click="btn_nuevo()"><span class="glyphicon glyphicon-file" aria-hidden="true"></span>  Nuevo Partido</a>

			               </div>
             		  </div>
      			</h1>
				{{-- Nuevo partido --}}
      			  <div id="area_nuevo" ng-if="nuevo_obj">
						 <div class="header_nuevo">
		                        <div class="col-sm-12">
		                              <h1><span>Nuevo</span>Partido</h1>
		                              <a class="btn_cerrar" ng-click="btn_nuevo()"></a>
		                        </div>
      					  </div>
      					   <div class="conte_nuevo">

      					   </div>

      			  </div>



      			  {{-- Opciones por calendario --}}
      			<div class="col-sm-12">
      				
      			</div>
		          <div class="col-sm-12 spi spd">
		          <div class="caja_submenu">
		          	 <ul>
		          	 	<li><a><strong>Calendario</strong></a></li>
		          	 	<li><a>Hoy</a></li>
		          	 	<li><a>Semana</a></li>
		          	 	<li><a>15 dias</a></li>
		          	 	<li><a>Mes</a></li>
		          	 	<li><a>Anteriores</a></li>
		          	 </ul>
		          </div>
						        

			          <div class="col-sm-12 spd spi" infinite-scroll="maspartidos()">

			          	  <div class="col-lg-3 col-md-6 col-sm-6" ng-repeat="partido in partidos">
			          	  		<div class="caja_section caja_partido">
			          	  		    {{-- Fecha y hora --}}
			          	  			<div class="area_date">
			          	  				<div class="col-xs-7 col-sm-7 spd spi">
			          	  				<p class="f_partido" >@{{ toDay(partido.fecha_partido)}},@{{partido.fecha_partido | amDateFormat: 'DD/MM/YYYY'}}</p>
			          	  				</div>
			          	  				 <div class="col-xs-5 col-sm-5 spd spi">
			          	  				  <p class="h_partido">@{{partido.hora_partido}}</p> 
			          	  				 </div>

			          	  			</div>

			          	  			{{-- Equipos --}}
			          	  			<div class="area_equipos">
			          	  				  <div class="col-xs-6 col-sm-6 spd spi">
				          	     			  	  <h3 class="n_equipo">@{{ partido.equipo_casa.nombre_equipo}}</h3>
				          	     			  	  <span class="ima_equipo" style="background: url('../../assets/img/@{{partido.equipo_casa.alias}}.svg') no-repeat center;"></span>
				          	     			  	  <p>Casa</p>
			          	     			  	  </div>
			          	     			  	  <div class="col-xs-6 col-sm-6 spd spi">
				          	     			  	  <h3 class="n_equipo">@{{ partido.equipo_visita.nombre_equipo}}</h3>
				          	     			  	  <span class="ima_equipo" style="background: url('../../assets/img//@{{partido.equipo_visita.alias}}.svg') no-repeat center;"></span>
				          	     			  	  <p>Visita</p>
			          	     			  	  </div>
			          	  			</div>

			          	  			{{-- Ligas --}}
			          	  			<div class="area_ligas">
			          	  				 <div class="col-sm-6 spd spi">
			          	     			  	   <p>@{{partido.nombre_liga.nombre_liga}}</p> 
			          	     			  	   </div>
			          	     			  	  <div class="col-sm-6 spd spi">
			          	     			  	  	<p></p>
			          	     			  	  </div>
			          	  			</div>

			          	  			{{-- Opciones --}}
			          	  			<div class="area_opcionesp">
			          	  				
			          	  			</div>
 			          	  		</div>
			          	  </div>
			          </div>
		          </div>
          </div>

@endsection

@push('scripts')
    <script src="/js/script.js"></script>
    <script src="/js/controller/PartidosController.js"></script>
@endpush