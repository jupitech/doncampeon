@extends('admin/layout')

@section('content')
 @include('admin.sections.menuequipos')
<?php
	$laliga=\Doncampeon\Models\Ligas::orderBy('id','ASC')->lists('nombre_liga','id');
	
 ?>
		<div class="col-sm-12">
      			<h1 class="page-header">
      			 <div class="col-sm-6 spi spd">
		                  Partidos
		             </div>
		            <div class="col-sm-6 spi spd">
		               @include('admin.partidos.section.areanuevo')
              		 </div>
      			</h1>
      			<div class="col-sm-12">
      				
      			</div>
		          <div class="col-sm-12 spi spd">
		          <div class="caja_submenu">
		          	 <ul>
		          	 	<li><a href="{{ URL::to('partidos') }}"><strong>Calendario</strong></a></li>
		          	 	<li><a href="{{ URL::to('partidos/hoy') }}">Hoy</a></li>
		          	 	<li><a href="{{ URL::to('partidos/semana') }}">Semana</a></li>
		          	 	<li><a href="{{ URL::to('partidos/2semanas') }}">15 dias</a></li>
		          	 	<li><a href="{{ URL::to('partidos/mes') }}">Mes</a></li>
		          	 	<li><a href="{{ URL::to('partidos/anteriores') }}">Anteriores</a></li>
		          	 </ul>
		          </div>
						          <div class="col-sm-12">
						             @if(Session::has('message'))
									  <div class="col-sm-12">
									  	<div class="alert alert-success alert-dismissible" role="alert">
											  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											  {{Session::get('message')}}
											</div>
									  </div>
				                      
									@endif
						          	 @include('admin.sections.errors')
						          </div>

			          <div class="col-sm-12 spd spi">
			          	   @include('admin.partidos.section.contenidopartidos')
			          </div>
		          </div>
          </div>
@stop