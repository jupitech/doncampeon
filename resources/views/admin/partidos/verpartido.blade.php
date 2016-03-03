@extends('admin/layout')

@section('content')
  @include('admin.sections.menuequipos')
      <div class="col-sm-12">
            <h1 class="page-header">Partido {{$partidos->EquipoCasa->nombre_equipo}}-{{$partidos->EquipoVisita->nombre_equipo}}</h1>
              @if(Session::has('message'))
                    <div class="col-sm-12">
                      <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        {{Session::get('message')}}
                      </div>
                    </div>
                              
                  @endif
            @include('admin.sections.errors')
              <div class="col-sm-12 spd spi">
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
                                  @if($partidos->partido_ter==0)
                                  {{-- Si no ha terminado el partido --}}
                                             {!! Form::open(['route'=>'partido.amarcador','method'=>'POST']) !!}
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
                                                            {!! Form::hidden('partido_id', $partidos->id,  ['class'=> 'form-control']) !!}
                                                            {!! Form::submit('Aplicar Marcador',['class' => 'btn btn-marcador']) !!}
                                                          </div>
                                              {!! Form::close() !!} 
                                  @else
                                        {{-- Si termino el partido --}}
                                                          <div class="col-xs-3 col-sm-3 spd spi">
                                                            <h3 class="n_equipo">{{ $partidos->EquipoCasa->nombre_equipo}}</h3>
                                                            <span class="ima_equipo vequi" style="background: url('../../assets/img/{{ $partidos->EquipoCasa->alias}}.svg') no-repeat center;"></span>
                                                            <p>Casa</p>
                                                          </div>
                                                          <?php
                                                              $resultado=\Doncampeon\Models\PartidoResultado::where('partido_id',$partidos->id)->first();
                                                                
                                                          ?>
                                                           <div class="col-xs-3 col-sm-3 spd spi">
                                                               <div class="col-xs-12 col-sm-12 col-md-12">
                                                                    <h2 class="h2_resul">{{$resultado->marcador_casa}}</h2>
                                                               </div>
                                                            
                                                           </div>
                                                           <div class="col-xs-3 col-sm-3 spd spi">
                                                               <div class="col-xs-12 col-sm-12 col-md-12">
                                                                      <h2 class="h2_resul">{{$resultado->marcador_visita}}</h2>     
                                                                </div>
                                                           </div>
                                                          <div class="col-xs-3 col-sm-3 spd spi">
                                                            <h3 class="n_equipo">{{ $partidos->EquipoVisita->nombre_equipo}}</h3>
                                                            <span class="ima_equipo vequi" style="background: url('../../assets/img/{{ $partidos->EquipoVisita->alias}}.svg') no-repeat center;"></span>
                                                            <p>Visita</p>
                                                          </div>
                                                          <div class="col-md-6 col-md-offset-3 dtable">
                                                          </div>
                                                 
                                  @endif         
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

            <div class="col-sm-12 spi spd">
                <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-5 col-lg-offset-0 spi">
                         <div class="caja_section caja_partido">
                               <div class="caja_header">
                                 <span class="ico_puntos"></span>
                                 <h3>Retos en Puntos</h3>
                               </div>
                               <div class="col-sm-12 spd spi ptable">
                                 <?php
                                 $retopuntos=\Doncampeon\Models\PartidoRetoPuntos::with('PerfilUsuario')->orderBy('created_at', 'ASC')->where('partido_id',$partidos->id)->get();

                                  ?>
                                  <table id="tabledonc" class="table dataTable" cellspacing="0" width="100%">
                                    <thead>
                                          <tr>
                                          <th>Campeón</th>
                                           <th>C</th>
                                            <th>V</th>
                                            <th>Puntos</th>
                                            <th>Fecha y Hora</th>
                                            <th>Estado</th>
                                          </tr>
                                    </thead>
                                    <tbody>
                                      @foreach($retopuntos as $retopunto)
                                           <tr>
                                              <td>{{$retopunto->PerfilUsuario->username}}</td>
                                             <td>{{$retopunto->marcador_casa}}</td>
                                             <td>{{$retopunto->marcador_visita}}</td>
                                             <td>{{$retopunto->cantidad_reto}}</td>
                                             <td>{{$retopunto->created_at->format('d/m/y h:i:s A' )}}</td>
                                             <td></td>
                                           </tr>
                                       @endforeach
                                    </tbody>
                                  </table>
                               </div>
                         </div>
                </div>
            </div>

         </div>
<script>
  jQuery(document).ready( function ($) {
      $('#tabledonc').dataTable( {
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.10/i18n/Spanish.json"
            },
               "order": [[ 4, "desc" ]],
              "info":     false
        } );
} );
</script>
@stop