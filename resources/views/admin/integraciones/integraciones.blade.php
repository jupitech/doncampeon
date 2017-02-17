@extends('admin/layout')

@section('content')
<?php
		
	
		
 ?>
   @include('admin.sections.menuintegraciones')
		<div class="col-sm-12">
      			<h1 class="page-header">Integraciones</h1>
		          <div class="col-sm-12 spi spd">
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