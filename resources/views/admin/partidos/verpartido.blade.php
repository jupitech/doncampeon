@extends('admin/layout')

@section('content')
  @include('admin.sections.menuequipos')
      <div class="col-sm-12">
            <h1 class="page-header">Partido {{$partidos->EquipoCasa->nombre_equipo}}-{{$partidos->EquipoVisita->nombre_equipo}}</h1>
            @include('admin.sections.errors')
             <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-5 col-lg-offset-0 spi">
             	 <div class="caja_section caja_partido">
               
                   <div class="area_date">
                                   <div class="col-xs-7 col-sm-7 spd spi">
                                   <p class="f_partido">
                                         @if($partidos->fecha_partido->format('l')=='Monday')
                                              Lunes
                                          @elseif($partidos->fecha_partido->format('l')=='Tuesday')
                                                Martes
                                         @elseif($partidos->fecha_partido->format('l')=='Wednesday')
                                                Miércoles
                                         @elseif($partidos->fecha_partido->format('l')=='Thursday')
                                              Jueves
                                         @elseif($partidos->fecha_partido->format('l')=='Friday')
                                               Viernes
                                         @elseif($partidos->fecha_partido->format('l')=='Saturday')
                                               Sábado
                                          @elseif($partidos->fecha_partido->format('l')=='Sunday')
                                               Domingo
                                          @endif
                                   ,{{ $partidos->fecha_partido->format('d/m/y')}}

                                   </p> 
                                   </div>
                                   <div class="col-xs-5 col-sm-5 spd spi">
                                      
                                   <p class="h_partido">{{ $partidos->hora_partido}}</p> 
                                   </div>
                    </div>
                    <div class="area_equipos">
                     {!! Form::model($partidos,['route'=>['partidos.update',$partidos->id],'method'=>'PUT']) !!}
                                  <div class="col-xs-3 col-sm-3 spd spi">
                                    <h3 class="n_equipo">{{ $partidos->EquipoCasa->nombre_equipo}}</h3>
                                    <span class="ima_equipo vequi" style="background: url('../../assets/img/{{ $partidos->EquipoCasa->alias}}.svg') no-repeat center;"></span>
                                    <p>Casa</p>
                                  </div>
                                   <div class="col-xs-3 col-sm-3 spd spi">
                                   <div class="col-xs-12 col-sm-12 col-md-12">
                                           <div class="form-group">
                                          {!! Form::number('marcador_casa', null, ['class'=> 'form-control input_marca']) !!}
                                      </div>
                                   </div>
                                    
                                   </div>
                                   <div class="col-xs-3 col-sm-3 spd spi">
                                   <div class="col-xs-12 col-sm-12 col-md-12">
                                       <div class="form-group">
                                            {!! Form::number('marcador_visita', null, ['class'=> 'form-control input_marca']) !!}
                                        </div>
                                    </div>
                                   </div>
                                  <div class="col-xs-3 col-sm-3 spd spi">
                                    <h3 class="n_equipo">{{ $partidos->EquipoVisita->nombre_equipo}}</h3>
                                    <span class="ima_equipo vequi" style="background: url('../../assets/img/{{ $partidos->EquipoVisita->alias}}.svg') no-repeat center;"></span>
                                    <p>Visita</p>
                                  </div>
                                  <div class="col-md-6 col-md-offset-3 dtable">
                                    {!! Form::submit('Aplicar Marcador',['class' => 'btn btn-marcador']) !!}
                                  </div>
                      {!! Form::close() !!}          
                    </div>
                    <div class="area_ligas">
                                   <div class="col-sm-6 spd spi">
                                   <p>{{ $partidos->NombreLiga->nombre_liga}}</p> 
                                   </div>
                                  <div class="col-sm-6 spd spi">
                                    <p></p>
                                  </div>
                    </div>
              
              
             	 </div>
             </div>
         </div>
@stop