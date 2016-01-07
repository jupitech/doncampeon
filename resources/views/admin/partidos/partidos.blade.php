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
		               <div class="area_btn_partido">

						  {!! Form::open(['route'=>['partidos.create'],'method'=>'GET']) !!}
						  <div class="col-lg-7 col-sm-6 spi spd">
						  	  {!! Form::select('ligas_id',$laliga, null, ['class'=> 'form-control selectpicker','data-live-search'=>'Ingresa nombre de la liga']) !!}
						  </div>
						  <div class="col-lg-5 col-sm-6 spi spd">
						  		{!! Form::submit('Nuevo partido',['class' => ' btn_partido btn btn-donc-nuevo']) !!}
						  </div>
						   
                          
                    		{!! Form::close() !!}

		                  
		               </div>
              	 </div>
      			</h1>
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