@extends('admin/layout')

@section('content')
 @include('admin.sections.menuequipos')
<?php
	$laliga=\Doncampeon\Models\Ligas::orderBy('id','ASC')->lists('nombre_liga','id');
	
 ?>
		<div class="col-sm-12">
      			<h1 class="page-header">
      			 <div class="col-sm-6 spi spd">
		                  Resultados
		             </div>
		            
      			</h1>
      			<div class="col-sm-12">
      				
      			</div>
		          <div class="col-sm-12 spi spd">
		          
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
			          	   @include('admin.resultados.section.contenidoresultados')
			          </div>
		          </div>
          </div>
@stop