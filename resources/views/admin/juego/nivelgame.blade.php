@extends('admin/layout')

@section('content')
<?php
		
		
		
 ?>
  @include('admin.sections.menujuego')
		<div class="col-sm-12">
      			<h1 class="page-header">
				 <div class="col-sm-6 spi spd">
      			    Juego
				 </div>	
					 <div class="col-sm-6 spi spd">
			         <div class="lbotones">
			            <a href="{{ URL::to('juego/create') }}" type="button" class="btn btn-donc-nuevo" aria-label="Left Align" ><span class="glyphicon glyphicon-chevron-up" aria-hidden="true"></span>  Nuevo Nivel</a>
			            
			         </div>
			         </div>
      			</h1>
		          <div class="col-sm-12 col-md-12 col-lg-12 spi spd">
		         
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
				        
				          		<ul class="tab_donc nav nav-tabs" role="tablist">
						            <li role="presentation" class="active"><a href="#general" aria-controls="general" role="tab" data-toggle="tab">Todos los niveles</a></li>
						           
						          </ul>  

						           <div class="tab-content">
              								 <div role="tabpanel" class="tab-pane active" id="general">
              								 <div class="col-lg-12 col-md-12">
												  <p class="descripcion_area">Son los niveles que determinaran el avance del campeón, en esta área están todos los niveles, se podrá cambiar los puntos de nuevo nivel.</p>
												  <p class="bs-callout bs-callout-info"> Al cambiar datos en esta área afectará a toda la <strong>modalidad del juego</strong>. Dentro de los datos, hay un registro único que obtiene todos los datos a continuación.</p>

												</div>
												 <div class="col-lg-12 col-md-12">
												    	@foreach($game_nivel as $game_niveles)
															  <div class="col-lg-3 col-md-4 col-sm-6">
															  	    <div class="caja_small">
															  	       <h3>{{$game_niveles->nivel_nombre}}</h3>
															  	        <div class="imagen_nivel">
																	  		<span class="imagen" style="background:url('../assets/img/niveles/{{$game_niveles->nivel_alias}}.svg') no-repeat center bottom !important;">
																	  			
																	  		</span>
																			<div class="area_opciones">
																 				<span class="ico_op dropdown">
					                                                                  <a class="btn btn-donc-editar glyphicon glyphicon-pencil" data-toggle="dropdown"></a>
					                                                                <ul class="dropdown-menu dropdown-menu-op">
					                                                                        <li>
					                                                                        	{!! Form::open(['route'=>['nivelgame.update',$game_niveles->id],'method'=>'PUT']) !!}
					                                                                        	<div class="col-sm-6">
				                                                                        			    <div class="form-group">
						                                                                        			 <label>Nombre</label>
						                                                                        		     {!! Form::text('nivel_nombre', $game_niveles->nivel_nombre, ['class'=> 'form-control']) !!}
					                                                                        		     </div>
					                                                                        	</div>
					                                                                        	<div class="col-sm-6">
					                                                                        		    <div class="form-group">
						                                                                        			 <label>Alias</label>
						                                                                        		     {!! Form::text('nivel_alias', $game_niveles->nivel_alias, ['class'=> 'form-control']) !!}
					                                                                        		     </div>
					                                                                        	</div>
					                                                                        	<div class="col-sm-12">
					                                                                        		    <div class="form-group">
						                                                                        	         <label>Puntos</label>
						                                                                        		     {!! Form::number('nivel_puntos', $game_niveles->nivel_puntos, ['class'=> 'form-control']) !!}
					                                                                        		     </div>
					                                                                        	</div>
					                                                                        	<div class="col-sm-6">
					                                                                        		    <div class="form-group">
						                                                                        	         <label>Minimo</label>
						                                                                        		     {!! Form::number('nivel_minimo', $game_niveles->nivel_minimo, ['class'=> 'form-control']) !!}
					                                                                        		     </div>
					                                                                        	</div>
					                                                                        	<div class="col-sm-6">
					                                                                        		    <div class="form-group">
						                                                                        	         <label>Bonificación</label>
						                                                                        		     {!! Form::number('nivel_bonus', $game_niveles->nivel_bonus, ['class'=> 'form-control']) !!}
					                                                                        		     </div>
					                                                                        	</div>
					                                                                        	<div class="col-md-offset-8 col-sm-4">
					                                                                        		  {!! Form::submit('Editar',['class' => 'btn_ni btn_opcio btn btn-donc-enlaces']) !!}
					                                                                        	</div>
					                                                                                {!! Form::close() !!}
					                                                                        </li>
					                                                                    </ul>

					                                                            </span>
																 			</div>

																	    </div>
																		<div class="puntos_juego smb">
																				<div class="p_niveles">
																					<span class="glyphicon glyphicon-chevron-up"></span> 
																		 			<p>{{$game_niveles->nivel_puntos}}</p>
																				</div>
																				<div class="mi_niveles">
																					<span class="glyphicon glyphicon-alert"></span>   
																		 			<p> {{$game_niveles->nivel_minimo}}</p>
																	 			</div>
																	 			<div class="bon_niveles">
																	 				<span class="glyphicon glyphicon-plus"></span>   
																		 			<p> {{$game_niveles->nivel_bonus}}</p>
																	 			</div>
															  	      </div>
															  	      <div class="area_db">
																 			<span class="nombre">Alias: </span>
																 			<p>{{$game_niveles->nivel_alias}}</p>
																 		</div>

															  </div>
															  </div>
																
														@endforeach
												 </div>
              								 </div>



  								    </div>
				          </div>
		          </div>
          </div>
@stop