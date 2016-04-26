@extends('admin/layout')

@section('content')
<?php
		
	
		
 ?>
   @include('admin.sections.menutukis')
		<div class="col-sm-12">
      			<h1 class="page-header">
			            <div class="col-sm-6 spi spd">
			                  Paquetes de Tukis
			             </div>
			            <div class="col-sm-6 spi spd">
			               <div class="lbotones">
			                  <a href="{{ URL::to('tukis/paquetes/store') }}" type="button" class="btn btn-donc-nuevo" aria-label="Left Align" ><span class="glyphicon glyphicon-file" aria-hidden="true"></span>  Nuevo Paquete</a>

			               </div>
			               </div>

			      </h1>
		          <div class="col-sm-7 spi spd">
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