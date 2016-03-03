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
                        <div class="col-sm-12 col-sm-offset-0 col-md-12 col-md-offset-0 col-lg-7 col-lg-offset-0 spi">
                          <div class="caja_section caja_partido">
                          
                                 <div class="area_chart">
                                        <div class="col-sm-12">
                                        
                                            <h4>Retos Hoy</h4>
                                            <canvas class="can_hoy" id="LineChart" height="200"></canvas>
                                        </div>
                                         <div class="col-sm-6">
                                           <h4>Retos Semana</h4>
                                           <canvas id="LineChartse"></canvas>

                                         </div>
                                         <div class="col-sm-6">
                                            <h4>Retos Mes</h4>
                                             <canvas id="LineChartm"></canvas>
                                         </div>
                                  </div>        
                                    

                                      <?php
                                      use Carbon\Carbon;
                                        $hoy=Carbon::today();
                                       $ayer=Carbon::today()->subDay(1);
                                       $mañana=Carbon::today()->addDay(1);
                                       $semana=Carbon::today()->startOfWeek();
                                       $imes=Carbon::today()->startOfMonth();
                                       $fmes=Carbon::today()->endOfMonth();
                                        
                                       $rpuntos_hoy_hora = DB::table('partido_retopuntos')
                                                 ->select(DB::raw('count(*) as contaretos, id'),DB::raw('DATE_FORMAT(created_at, "%H") as mihora'),DB::raw('DATE_FORMAT(created_at, "%T") as mitiempo'))
                                                 ->where('partido_id','=',$partidos->id)
                                                 ->where('created_at','>=', $hoy)
                                                 ->groupBy(DB::raw('DATE_FORMAT(created_at, "%H")'))
                                                 ->lists(DB::raw('DATE_FORMAT(created_at, "%H") as mihora'));

                                      $rpuntos_hoy_retos = DB::table('partido_retopuntos')
                                                 ->select(DB::raw('count(*) as contaretos, id'),DB::raw('DATE_FORMAT(created_at, "%H") as mihora'),DB::raw('DATE_FORMAT(created_at, "%T") as mitiempo'))
                                                 ->where('partido_id','=',$partidos->id)
                                                 ->where('created_at','>=', $hoy)
                                                 ->groupBy(DB::raw('DATE_FORMAT(created_at, "%H")'))
                                                 ->lists('contaretos');


                                      $rpuntos_semana_dia = DB::table('partido_retopuntos')
                                                 ->select(DB::raw('count(*) as contaretos, id'),DB::raw('DATE_FORMAT(created_at, "%W") as midia'),DB::raw('DATE_FORMAT(created_at, "%T") as mitiempo'))
                                                 ->where('partido_id','=',$partidos->id)
                                                 ->where('created_at','>=', $semana)
                                                 ->groupBy(DB::raw('DATE_FORMAT(created_at, "%W")'))
                                                 ->orderBy('midia','ASC')
                                                 ->lists(DB::raw('DATE_FORMAT(created_at, "%W") as midia'));

                                      $rpuntos_semana_retos = DB::table('partido_retopuntos')
                                                 ->select(DB::raw('count(*) as contaretos, id'),DB::raw('DATE_FORMAT(created_at, "%W") as midia'),DB::raw('DATE_FORMAT(created_at, "%T") as mitiempo'))
                                                 ->where('partido_id','=',$partidos->id)
                                                 ->where('created_at','>=', $semana)
                                                 ->groupBy(DB::raw('DATE_FORMAT(created_at, "%W")'))
                                                 ->orderBy('contaretos','ASC')
                                                 ->lists('contaretos');  

                                      $rpuntos_mes_dia = DB::table('partido_retopuntos')
                                                 ->select(DB::raw('count(*) as contaretos, id'),DB::raw('DATE_FORMAT(created_at, "%d") as midia'),DB::raw('DATE_FORMAT(created_at, "%T") as mitiempo'))
                                                 ->where('partido_id','=',$partidos->id)
                                                 ->where('created_at','>=', $imes)
                                                 ->groupBy(DB::raw('DATE_FORMAT(created_at, "%d")'))
                                                 ->orderBy('midia','ASC')
                                                 ->lists(DB::raw('DATE_FORMAT(created_at, "%d") as midia'));

                                      $rpuntos_mes_retos = DB::table('partido_retopuntos')
                                                 ->select(DB::raw('count(*) as contaretos, id'),DB::raw('DATE_FORMAT(created_at, "%d") as midia'),DB::raw('DATE_FORMAT(created_at, "%T") as mitiempo'))
                                                 ->where('partido_id','=',$partidos->id)
                                                 ->where('created_at','>=', $imes)
                                                 ->groupBy(DB::raw('DATE_FORMAT(created_at, "%d")'))
                                                 ->orderBy('contaretos','ASC')
                                                 ->lists('contaretos');                 
                                
                                      ?>

                                     <script>
                                            (function() {
                                                 var ctx = document.getElementById('LineChart').getContext('2d');
                                                 var options = {
                                                 responsive: true,
                                                  maintainAspectRatio: false,
                                                  showTooltip: true,
                                                 tooltipTemplate: "<%= value %>",
                                                 bezierCurve: true,
                                                 bezierCurveTension : 0.3,
                                                  pointHitDetectionRadius : 20,
                                                 }
                                                 var chart = {
                                                    labels: {!! json_encode( $rpuntos_hoy_hora) !!},
                                                    datasets: [{
                                                        data: {{ json_encode( $rpuntos_hoy_retos ) }},
                                                        fillColor : "rgba(28, 162, 223,0.3)",
                                                        strokeColor : "rgba(28, 162, 223,0.5)",
                                                        pointColor : "rgb(141, 202, 61)",
                                                         pointStrokeColor: "#fff",
                                                         pointHighlightFill: "#fff",
                                                         pointHighlightStroke: "rgba(220,220,220,1)",

                                                    }]
                                                 };

                                                 new Chart(ctx).Line(chart,options);
                                            })();
                                        </script>

                                        <script>
                                            (function() {
                                                 var ctxse = document.getElementById('LineChartse').getContext('2d');
                                                 var optionsse = {
                                                 responsive: true,
                                                  maintainAspectRatio: false,
                                                  showTooltip: true,
                                                 tooltipTemplate: "<%= value %>",
                                                 bezierCurve: true,
                                                 bezierCurveTension : 0.4,
                                                 }
                                                 var chartse = {
                                                    labels: {!! json_encode($rpuntos_semana_dia) !!},
                                                    datasets: [{
                                                        data: {{ json_encode( $rpuntos_semana_retos ) }},
                                                        fillColor : "rgba(28, 162, 223,0.3)",
                                                        strokeColor : "rgba(28, 162, 223,0.5)",
                                                        pointColor : "rgb(141, 202, 61)",
                                                         pointStrokeColor: "#fff",
                                                         pointHighlightFill: "#fff",
                                                         pointHighlightStroke: "rgba(220,220,220,1)",
                                                    }]
                                                 };

                                                 new Chart(ctxse).Line(chartse,optionsse);
                                            })();
                                        </script>

                                         <script>
                                            (function() {
                                                 var ctxm = document.getElementById('LineChartm').getContext('2d');
                                                 var optionsm = {
                                                 responsive: true,
                                                  maintainAspectRatio: false,
                                                  showTooltip: true,
                                                 tooltipTemplate: "<%= value %>",
                                                 bezierCurve: true,
                                                 bezierCurveTension : 0.4,
                                                 }
                                                 var chartm = {
                                                    labels: {!! json_encode($rpuntos_mes_dia) !!},
                                                    datasets: [{
                                                        data: {{ json_encode( $rpuntos_mes_retos ) }},
                                                        fillColor : "rgba(28, 162, 223,0.3)",
                                                        strokeColor : "rgba(28, 162, 223,0.5)",
                                                        pointColor : "rgb(141, 202, 61)",
                                                         pointStrokeColor: "#fff",
                                                         pointHighlightFill: "#fff",
                                                         pointHighlightStroke: "rgba(220,220,220,1)",
                                                    }]
                                                 };

                                                 new Chart(ctxm).Line(chartm,optionsm);
                                            })();
                                        </script>


                                 </div>
                          

                          </div>
                        
             </div>

            <div class="col-sm-12 spi spd">
                <div class="col-sm-12 col-sm-offset-0 col-md-12 col-md-offset-0 col-lg-6 col-lg-offset-0 spi">
                         <div class="caja_section caja_partido">
                               <div class="caja_header">
                                 <span class="ico_puntos"></span>
                                 <h3>Retos en Puntos</h3>
                               </div>
                               <div class="col-sm-12 spd spi ptable">
                                 <?php
                                 $retopuntos=\Doncampeon\Models\PartidoRetoPuntos::with('PerfilUsuario')->orderBy('created_at', 'ASC')->where('partido_id',$partidos->id)->get();
                                  $probabilidades=\Doncampeon\Models\ProbabilidadesLigas::orderBy('created_at', 'ASC')->where('ligas_id',$partidos->liga)->get();
                                  ?>
                                  <table id="tabledonc" class="table dataTable" cellspacing="0" width="100%">
                                    <thead>
                                          <tr>
                                          <th>Campeón</th>
                                           <th class="nume">C</th>
                                            <th class="nume">V</th>
                                            <th class="nume">Puntos</th>
                                            <th>Probabilidad</th>
                                            <th>Fecha y Hora</th>
                                            <th>Estado</th>
                                          </tr>
                                    </thead>
                                    <tbody>
                                      @foreach($retopuntos as $retopunto)
                                           <tr>
                                              <td>{{$retopunto->PerfilUsuario->username}}</td>
                                             <td class="nume">{{$retopunto->marcador_casa}}</td>
                                             <td class="nume">{{$retopunto->marcador_visita}}</td>
                                             <td class="nume encele"><strong>{{$retopunto->cantidad_reto}}</strong></td>
                                             <td>
                                               @foreach($probabilidades as $probabilidad)
                                                @if($probabilidad->marcador_casa==$retopunto->marcador_casa and $probabilidad->marcador_visita==$retopunto->marcador_visita)
                                                   
                                                 X {{$probabilidad->duplicador}} = <strong>{{$retopunto->cantidad_reto*$probabilidad->duplicador}}</strong>
                                                    
                                                @endif
                                               @endforeach
                                             </td>
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
               "order": [[ 5, "desc" ]],
              "info":     false
        } );
} );
</script>
@stop