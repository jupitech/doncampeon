@extends('admin/layout')

@section('content')
 @include('admin.sections.menuequipos')
<?php
	
		
 ?>
		<div class="col-sm-12">
      			<h1 class="page-header">Partidos</h1>
		          <div class="col-sm-12 spi spd">
		          <div class="caja_submenu">
		          	 <ul>
		          	 	<li><a href=""><strong>Calendario</strong></a></li>
		          	 	<li><a href="">Hoy</a></li>
		          	 	<li><a href="">Semana</a></li>
		          	 	<li><a href="">15 dias</a></li>
		          	 	<li><a href="">Mes</a></li>
		          	 </ul>
		          </div>
				          <div class="caja_section">
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
				        
				          </div>
		          </div>
          </div>
@stop