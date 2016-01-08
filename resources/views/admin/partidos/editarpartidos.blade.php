@extends('admin/layout')

@section('content')
  @include('admin.sections.menuequipos')
      <div class="col-sm-12">
          <h1 class="page-header">Nuevo Equipo</h1>
             <div class="col-sm-6 spi">
             	 <div class="caja_section">
               <div class="col-sm-12">
                  @include('admin.sections.errors')
             	      <?php
                      $equipos=DB::table('dc_equipos')->leftjoin('ligas_equipos','dc_equipos.id','=','ligas_equipos.equipos_id')->where('ligas_equipos.ligas_id',$partidos->liga)->orderBy('dc_equipos.id','ASC')->select('dc_equipos.nombre_equipo as nombreequipo','dc_equipos.id as elid')->lists('nombreequipo','elid');
                      $nombreliga=Doncampeon\Models\Ligas::where('id',$partidos->liga)->first()->nombre_liga;
                      ?>
                         {!! Form::model($partidos,['route'=>['partidos.update',$partidos->id],'method'=>'PUT']) !!}

                      <div class="col-sm-6 spi">
                                  <div class="form-group">
                                      <label>Liga</label>
                                         {!! Form::label('ligass', $nombreliga, ['class'=> 'form-control','placeholder'=>'Ingresa nombre del equipo']) !!}
                                  </div>
                            </div>

                             <div class="col-sm-6 spi">
                                  <div class="form-group">
                                      <label>Estadio</label>
                                         {!! Form::label('ligas', $nombreliga, ['class'=> 'form-control','placeholder'=>'Ingresa nombre del equipo']) !!}
                                  </div>
                            </div>

                             <div class="col-sm-6 spi">
                                  <div class="form-group">
                                      <label>Equipo Casa</label>
                                       {!! Form::select('equipo_casa',$equipos, null, ['class'=> 'form-control selectpicker','data-live-search'=>'Ingresa nombre del pais']) !!}
                                  </div>
                            </div>
                             <div class="col-sm-6 spd">
                                 <div class="form-group">
                                    <label>Equipo Visitante</label>
                                   {!! Form::select('equipo_visita',$equipos, null, ['class'=> 'form-control selectpicker','data-live-search'=>'Ingresa nombre del pais']) !!}
                                </div>
                              </div>  
                            <div class="col-sm-6 spi">
                                 <div class="form-group">
                                    <label>Dia del partido</label>
                                   {!! Form::text('fecha_partido', $partidos->fecha_partido,  ['id'=>'datetimepicker2','class'=> 'form-control','placeholder'=>'Ingresa fecha aqui']) !!}
                                       
                                </div>
                              </div>

                               <div class="col-sm-6 spi">
                                 <div class="form-group">
                                    <label>Hora del partido  Actual es: {{$partidos->hora_partido}}</label>
                                     {!! Form::text('hora_partido', $partidos->hora_partido,  ['id'=>'datetimepicker3','class'=> 'form-control','placeholder'=>'Ingresa fecha aqui']) !!}
                                  
                                </div>
                              </div> 

                              <script type="text/javascript">
                                      $(document).ready(function(){
                                            $('#datetimepicker2').datetimepicker({
                                                 format: 'YYYY-MM-DD'
                                           });
                                      });
                                  </script> 

                                   <script type="text/javascript">
                                      $(document).ready(function(){
                                            $('#datetimepicker3').datetimepicker({
                                                 format: 'HH:mm'    
                                           });
                                      });
                                  </script> 
                             <div class="col-sm-12 spi">
                                 <div class="form-group">
                                    <label>Descripción</label>
                                     {!! Form::text('descripcion', '',  ['class'=> 'form-control','placeholder'=>'Ingresa descripción del partido']) !!}
                                  
                                </div>
                              </div> 
                            
                            <div>
                                {!! Form::hidden('editor_id', isset(Auth::user()->id) ? Auth::user()->id : Auth::user()->email,  ['class'=> 'form-control']) !!}
                                {!! Form::submit('Guardar',['class' => 'btn btn-primary']) !!}
                            </div>
                        {!! Form::close() !!}
                 </div>
              
             	 </div>
             </div>
         </div>
@stop