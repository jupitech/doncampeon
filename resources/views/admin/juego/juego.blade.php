@extends('admin/layout')

@section('content')
<?php
		
		
		
 ?>
  @include('admin.sections.menujuego')
		<div class="col-sm-12">
      			<h1 class="page-header">Juego</h1>
		          <div class="col-sm-12 col-md-12 col-lg-10 spi spd">
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
						            <li role="presentation" class="active"><a href="#general" aria-controls="general" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-cog"></span> Reglas Generales</a></li>
						           
						          </ul>  

						           <div class="tab-content">
              								 <div role="tabpanel" class="tab-pane active" id="general">
              								 <div class="col-lg-12 col-md-12">
												  <p class="descripcion_area">Esta área es la que ejecuta acciones para que el juego sea dinámico entre los campeones registrados, los cambios aquí serán exporádicos por la que solo los <strong>administradores</strong> pueden cambiar la modalidad del juego.</p>
												  <p class="bs-callout bs-callout-info"> Al cambiar datos en esta área afectará a toda la <strong>modalidad del juego</strong>. Dentro de los datos, hay un registro único que obtiene todos los datos a continuación.</p>

												</div>
												 <div class="col-lg-12 col-md-12">
												    	
																 <div class="col-lg-4 col-md-4 col-sm-6">
																 	<div class="caja_small">
																 		<h3>Puntos Iniciales</h3>
																 		<div class="puntos_juego">
																 			<p>{{$game_parametro->puntos_iniciales}}</p>
																 			<div class="area_opciones">
																 				<span class="ico_op dropdown">
					                                                                  <a class="btn btn-donc-editar glyphicon glyphicon-pencil" data-toggle="dropdown"></a>
					                                                                <ul class="dropdown-menu dropdown-menu-op">
					                                                                        <li>
					                                                                        	{!! Form::open(['route'=>['updatepuntosiniciales',$game_parametro->id],'method'=>'PUT']) !!}
					                                                                        	<div class="col-sm-8">
					                                                                        		     {!! Form::text('puntos_iniciales', $game_parametro->puntos_iniciales, ['class'=> 'form-control']) !!}
					                                                                        	</div>
					                                                                        	<div class="col-sm-4">
					                                                                        		  {!! Form::submit('Editar',['class' => 'btn_opcio btn btn-donc-enlaces']) !!}
					                                                                        	</div>
					                                                                                {!! Form::close() !!}
					                                                                        </li>
					                                                                    </ul>

					                                                            </span>
																 			</div>
																 		</div>
																 		<div class="col-sm-12 descri_parametros">
																 			<p>Puntos asignados a nuevos campeones que se unen a la comunidad Don Campeón, con estos puntos podrán realizar máximo <strong>10</strong> retos con el límite de retos asignado que son <strong>{{$game_parametro->minimo_retos}}</strong>.</p>
																 		</div>
																 		<div class="area_db">
																 			<span class="glyphicon glyphicon-tasks"></span>
																 			<p>puntos_iniciales</p>
																 		</div>
																 	</div>
																 </div>

																 <div class="col-lg-4 col-md-4 col-sm-6">
																 	<div class="caja_small">
																 		<h3>Límite de Retos</h3>
																 		<div class="puntos_juego">
																 			<p>{{$game_parametro->minimo_retos}}</p>
																 			<div class="area_opciones">
																 				<span class="ico_op dropdown">
					                                                                  <a class="btn btn-donc-editar glyphicon glyphicon-pencil" data-toggle="dropdown"></a>
					                                                                <ul class="dropdown-menu dropdown-menu-op">
					                                                                        <li>
					                                                                        	{!! Form::open(['route'=>['updateminimoretos',$game_parametro->id],'method'=>'PUT']) !!}
					                                                                        	<div class="col-sm-8">
					                                                                        		     {!! Form::text('minimo_retos', $game_parametro->minimo_retos, ['class'=> 'form-control']) !!}
					                                                                        	</div>
					                                                                        	<div class="col-sm-4">
					                                                                        		  {!! Form::submit('Editar',['class' => 'btn_opcio btn btn-donc-enlaces']) !!}
					                                                                        	</div>
					                                                                                {!! Form::close() !!}
					                                                                        </li>
					                                                                    </ul>

					                                                            </span>
																 			</div>
																 		</div>
																 		<div class="col-sm-12 descri_parametros">
																 			<p>El límite es para determinar el mínimo de puntos que se pueden agregar para un reto en el partido, este dato es el determinado y ayudará a todos los campeones la modalidad del juego free.</p>
																 		</div>
																 		<div class="area_db">
																 			<span class="glyphicon glyphicon-tasks"></span>
																 			<p>minimo_retos</p>
																 		</div>
															 		</div>
																 </div>

																 <div class="col-lg-4 col-md-4 col-sm-6">
																 	<div class="caja_small">
																 		<h3>Puntos en el mínimo</h3>
																 		<div class="puntos_juego">
																 			<p>{{$game_parametro->puntos_recompensa}}</p>
																 			<div class="area_opciones">
																 				<span class="ico_op dropdown">
					                                                                  <a class="btn btn-donc-editar glyphicon glyphicon-pencil" data-toggle="dropdown"></a>
					                                                                <ul class="dropdown-menu dropdown-menu-op">
					                                                                        <li>
					                                                                        	{!! Form::open(['route'=>['updatepuntosrecompensa',$game_parametro->id],'method'=>'PUT']) !!}
					                                                                        	<div class="col-sm-8">
					                                                                        		     {!! Form::text('puntos_recompensa', $game_parametro->puntos_recompensa, ['class'=> 'form-control']) !!}
					                                                                        	</div>
					                                                                        	<div class="col-sm-4">
					                                                                        		  {!! Form::submit('Editar',['class' => 'btn_opcio btn btn-donc-enlaces']) !!}
					                                                                        	</div>
					                                                                                {!! Form::close() !!}
					                                                                        </li>
					                                                                    </ul>

					                                                            </span>
																 			</div>
																 		</div>
																 		<div class="col-sm-12 descri_parametros">
																 			<p>Estos puntos son recompensa a campeones que han jugado y se quedaron a <strong> 0 puntos</strong> en sus retos, y se activa cuando el partido concluye y se agregan los resultados, determinará cuantos campeones perdieron y tienen <strong> 0 puntos</strong>, recompensando para que puedan realizar por lo menos <strong> 4 retos</strong>.</p>
																 		</div>
																 		<div class="area_db">
																 			<span class="glyphicon glyphicon-tasks"></span>
																 			<p>puntos_recompensa</p>
																 		</div>
																 	</div>
																 </div>


																 <div class="col-lg-4 col-md-4 col-sm-6">
																 	<div class="caja_small">
																 		<h3>No. Juegos para recompensa</h3>
																 		<div class="puntos_juego">
																 			<p>{{$game_parametro->recompensa_nojuegos}}</p>
																 			<div class="area_opciones">
																 				<span class="ico_op dropdown">
					                                                                  <a class="btn btn-donc-editar glyphicon glyphicon-pencil" data-toggle="dropdown"></a>
					                                                                <ul class="dropdown-menu dropdown-menu-op">
					                                                                        <li>
					                                                                        	{!! Form::open(['route'=>['updaterecompensanojuegos',$game_parametro->id],'method'=>'PUT']) !!}
					                                                                        	<div class="col-sm-8">
					                                                                        		     {!! Form::text('recompensa_nojuegos', $game_parametro->recompensa_nojuegos, ['class'=> 'form-control']) !!}
					                                                                        	</div>
					                                                                        	<div class="col-sm-4">
					                                                                        		  {!! Form::submit('Editar',['class' => 'btn_opcio btn btn-donc-enlaces']) !!}
					                                                                        	</div>
					                                                                                {!! Form::close() !!}
					                                                                        </li>
					                                                                    </ul>

					                                                            </span>
																 			</div>
																 		</div>
																 		<div class="col-sm-12 descri_parametros">
																 			<p>Número de veces que han realizado retos para que el contador de recompensa ejecute una acción y regale los puntos que están asignados en esta opción. Es importante saber que realizara un multiplicador según este número.</p>
																 		</div>
																 		<div class="area_db">
																 			<span class="glyphicon glyphicon-tasks"></span>
																 			<p>recompensa_nojuegos</p>
																 		</div>
																 	</div>
																 </div>

																 <div class="col-lg-4 col-md-4 col-sm-6">
																 	<div class="caja_small">
																 		<h3>Puntos por Recompensa de Juegos</h3>
																 		<div class="puntos_juego">
																 			<p>{{$game_parametro->recompensa_pjuegos}}</p>
																 			<div class="area_opciones">
																 				<span class="ico_op dropdown">
					                                                                  <a class="btn btn-donc-editar glyphicon glyphicon-pencil" data-toggle="dropdown"></a>
					                                                                <ul class="dropdown-menu dropdown-menu-op">
					                                                                        <li>
					                                                                        	{!! Form::open(['route'=>['updaterecompensapjuegos',$game_parametro->id],'method'=>'PUT']) !!}
					                                                                        	<div class="col-sm-8">
					                                                                        		     {!! Form::text('recompensa_pjuegos', $game_parametro->recompensa_pjuegos, ['class'=> 'form-control']) !!}
					                                                                        	</div>
					                                                                        	<div class="col-sm-4">
					                                                                        		  {!! Form::submit('Editar',['class' => 'btn_opcio btn btn-donc-enlaces']) !!}
					                                                                        	</div>
					                                                                                {!! Form::close() !!}
					                                                                        </li>
					                                                                    </ul>

					                                                            </span>
																 			</div>
																 		</div>
																 		<div class="col-sm-12 descri_parametros">
																 			<p>Número de veces que han realizado retos para que el contador de recompensa ejecute una acción y regale los puntos que están asignados en esta opción. Es importante saber que realizara un multiplicador según este número.</p>
																 		</div>
																 		<div class="area_db">
																 			<span class="glyphicon glyphicon-tasks"></span>
																 			<p>recompensa_pjuegos</p>
																 		</div>
																 	</div>
																 </div>
																

												 </div>
              								 </div>



  								    </div>
				          </div>
		          </div>
          </div>
@stop