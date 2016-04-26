 <?php 

		\Carbon\Carbon::setLocale('es');
		$mihora=\Carbon\Carbon::now()->toDateString();	
		$midia=\Carbon\Carbon::today();	

  ?>
 @foreach($partidos as $partido)
 
			          	     	<div class="col-lg-4 col-md-6 col-sm-12">
			          	     		<div class="caja_section caja_partido">

			          	     			  <div class="area_date">
			          	     			  	   <div class="col-xs-7 col-sm-7 spd spi">
			          	     			  	   <p class="f_partido">
				                                         @if($partido->fecha_partido->format('l')=='Monday')
				                                              Lunes
				                                         @elseif($partido->fecha_partido->format('l')=='Tuesday')
				                                                Martes
				                                         @elseif($partido->fecha_partido->format('l')=='Wednesday')
				                                                Miércoles
				                                         @elseif($partido->fecha_partido->format('l')=='Thursday')
				                                              Jueves
				                                         @elseif($partido->fecha_partido->format('l')=='Friday')
				                                               Viernes
				                                         @elseif($partido->fecha_partido->format('l')=='Saturday')
				                                               Sábado
				                                         @elseif($partido->fecha_partido->format('l')=='Sunday')
				                                               Domingo
				                                         @endif
				                                         ,{{ $partido->fecha_partido->format('d/m/y')}}

				                                   </p> 
			          	     			  	   </div>
			          	     			  	   <div class="col-xs-5 col-sm-5 spd spi">
			          	     			  	  		
			          	     			  	   <p class="h_partido">{{ $partido->hora_partido}}</p> 
			          	     			  	   </div>
			          	     			  </div>
			          	     			  <div class="area_equipos">
			          	     			  	  <div class="col-xs-3 col-sm-4 spd spi">
				          	     			  	  <h3 class="n_equipo">{{ $partido->EquipoCasa->nombre_equipo}}</h3>
				          	     			  	  <span class="ima_equipo" style="background: url('../../assets/img/{{ $partido->EquipoCasa->alias}}.svg') no-repeat center;"></span>
				          	     			  	  <p>Casa</p>
			          	     			  	  </div>
			          	     			  	     <?php
                                                              $resultado=\Doncampeon\Models\PartidoResultado::where('partido_id',$partido->id)->first();
                                                              $retospuntos=\Doncampeon\Models\PartidoRetoPuntos::where('partido_id',$partido->id)->count(); 
                                                          ?>
                                                           <div class="col-xs-2 col-sm-2 spd spi">
                                                               <div class="col-xs-12 col-sm-12 col-md-12">
                                                                    <h2 class="h2_resul"><span class="ico_menos"></span>{{$resultado->marcador_casa}}</h2>
                                                               </div>
                                                            
                                                           </div>
                                                           <div class="col-xs-2 col-sm-2 spd spi">
                                                               <div class="col-xs-12 col-sm-12 col-md-12">
                                                                      <h2 class="h2_resul">{{$resultado->marcador_visita}}</h2>     
                                                                </div>
                                                           </div>
			          	     			  	  <div class="col-xs-3 col-sm-4 spd spi">
				          	     			  	  <h3 class="n_equipo">{{ $partido->EquipoVisita->nombre_equipo}}</h3>
				          	     			  	  <span class="ima_equipo" style="background: url('../../assets/img/{{ $partido->EquipoVisita->alias}}.svg') no-repeat center;"></span>
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
						          	     			  <div class="col-sm-6 spd spi">
						          	     			  	<span class="ico_puntos size_esca"></span>
						          	     			  	<p class="tex_retos">{{$retospuntos}}</p>
						          	     			  	<span class="ico_tukis size_esca"></span>
						          	     			  	<p class="tex_retos"></p>
						          	     			  </div>
						          	     			  <div class="col-sm-6 spd spi">

						          	     			  	  <span class="ico_op dropdown">
								                                    <a class="btn btn-donc-eliminar glyphicon drop_delete glyphicon-remove" data-toggle="dropdown"></a>
								                                  <ul class="dropdown-menu dropdown-menu-op">
								                                          <li>
								                                          <p>
								                                                  {!! Form::open(['route'=>['partidos.destroy',$partido->id],'method'=>'DELETE']) !!}
								                                                        {!! Form::submit('Eliminar',['class' => 'btn btn-donc-danger']) !!}
								                                                  {!! Form::close() !!}
								                                              </p>
								                                           <p> {{$partido->fecha_partido->format('d/m/y')}}</p>
								                                          </li>
								                                      </ul>

								                              </span>
							          	     			  	    <span class="ico_op">
									                                   {!!link_to_route('partidos.edit', $title = '', $parameters = $partido->id, $attributes = ['class'=>'btn btn-donc-editar glyphicon glyphicon-pencil'])!!}
									                              </span>
									                               <span class="ico_op">
								          	     			     {!!link_to_route('partidos.ver', $title = '', $parameters = $partido->id, $attributes = ['class'=>'btn btn-donc-editar glyphicon glyphicon-eye-open'])!!}
								          	     			   </span>
						          	     			  </div>
			          	     			
			          	     			  </div>
			          	     		</div>
			          	     	</div>
  	     
	    @endforeach