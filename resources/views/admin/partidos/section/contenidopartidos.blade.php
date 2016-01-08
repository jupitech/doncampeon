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
			          	     			  </div>
			          	     		</div>
			          	     	</div>
			          	    @endforeach