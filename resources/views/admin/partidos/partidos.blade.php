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
			          	    @foreach($partidos as $partido)
			          	     	<div class="col-lg-3 col-md-6 col-sm-6">
			          	     		<div class="caja_section caja_partido">
			          	     			  <div class="area_date">
			          	     			  	   <div class="col-xs-6 col-sm-6 spd spi">
			          	     			  	   <p class="f_partido">{{ $partido->fecha_partido->format('d/m/y')}}</p> 
			          	     			  	   </div>
			          	     			  	   <div class="col-xs-6 col-sm-6 spd spi">
			          	     			  	   <p class="h_partido">{{ $partido->hora_partido}}</p> 
			          	     			  	   </div>
			          	     			  </div>
			          	     			  <div class="area_equipos">
			          	     			  	  <div class="col-xs-6 col-sm-6 spd spi">
				          	     			  	  <h3 class="n_equipo">{{ $partido->EquipoCasa->nombre_equipo}}</h3>
				          	     			  	  <span class="ima_equipo" style="background: url('../assets/img/{{ $partido->EquipoCasa->alias}}.svg') no-repeat center;"></span>
				          	     			  	  <p>Casa</p>
			          	     			  	  </div>
			          	     			  	  <div class="col-xs-6 col-sm-6 spd spi">
				          	     			  	  <h3 class="n_equipo">{{ $partido->EquipoVisita->nombre_equipo}}</h3>
				          	     			  	  <span class="ima_equipo" style="background: url('../assets/img/{{ $partido->EquipoVisita->alias}}.svg') no-repeat center;"></span>
				          	     			  	  <p>Visita</p>
			          	     			  	  </div>
			          	     			  </div>
			          	     			  <div class="area_ligas">
			          	     			  	   <div class="col-sm-6 spd spi">
			          	     			  	   <p>{{ $partido->NombreLiga->nombre_liga}}</p> 
			          	     			  	   </div>
			          	     			  	  <div class="col-sm-6 spd spi">
			          	     			  	  	<p></p>
			          	     			  	  </div>
			          	     			  </div>
			          	     			  <div class="area_opcionesp">
			          	     			  <span class="ico_op dropdown">
				                                    <a class="btn btn-donc-eliminar glyphicon drop_delete glyphicon-remove" data-toggle="dropdown"></a>
				                                  <ul class="dropdown-menu dropdown-menu-op">
				                                          <li>
				                                          <p>
				                                                  {!! Form::open(['route'=>['equipos.destroy',$partido->id],'method'=>'DELETE']) !!}
				                                                        {!! Form::submit('Eliminar',['class' => 'btn btn-donc-danger']) !!}
				                                                  {!! Form::close() !!}
				                                              </p>
				                                           <p> {{$partido->fecha_partido->format('d/m/y')}}</p>
				                                          </li>
				                                      </ul>

				                              </span>
			          	     			  	    <span class="ico_op">
					                                   {!!link_to_route('equipos.edit', $title = '', $parameters = $partido->id, $attributes = ['class'=>'btn btn-donc-editar glyphicon glyphicon-pencil'])!!}
					                              </span>
			          	     			  </div>
			          	     		</div>
			          	     	</div>
			          	    @endforeach
			          </div>
		          </div>
          </div>
@stop