@extends('admin/layout')

@section('content')
  @include('admin.sections.menuequipos')
      <div class="col-sm-12">
          <h1 class="page-header">Nueva Probabilidad</h1>
             <div class="col-sm-12 col-md-10 col-lg-6 spi">
               <div class="caja_section">
               <div class="col-sm-12">
                  @include('admin.sections.errors')
                    <?php
                      $laliga=\Doncampeon\Models\Ligas::orderBy('id','ASC')->lists('nombre_liga','id');
                      ?>
                        {!! Form::open(['route'=>'probabilidades.store','method'=>'POST']) !!}
                             <div class="col-sm-8 spi">
                                        <div class="form-group">
                                        <label>Liga</label>
                                       {!! Form::select('ligas_id',$laliga, null, ['class'=> 'form-control selectpicker','data-live-search'=>'Ingresa nombre del pais']) !!}
                                    </div>
                            </div>
                                <div class="col-sm-4 spd">
                                    <div class="form-group">
                                        <label>No. Partidos</label>
                                        {!! Form::number('no_partidos', null, ['class'=> 'form-control','placeholder'=>'No de Partidos']) !!}
                                    </div>
                                  </div>
                            <div class="col-sm-3 spi">
                                <div class="form-group">
                                    <label>Casa</label>
                                    {!! Form::number('marcador_casa', null, ['class'=> 'form-control','placeholder'=>'Marcador de Casa']) !!}
                                </div>
                              </div>
                              <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Visita</label>
                                    {!! Form::number('marcador_visita', null, ['class'=> 'form-control','placeholder'=>'Marcador de Visita']) !!}
                                </div>
                              </div>
                              <div class="col-sm-3">
                                <div class="form-group">
                                    <label>% Proba</label>
                                    {!! Form::number('probabilidad_por', null, ['class'=> 'form-control','placeholder'=>'% proba.']) !!}
                                </div>
                              </div>
                              <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Duplicar X:</label>
                                    {!! Form::number('duplicador', null, ['class'=> 'form-control','placeholder'=>'2, 3, 4']) !!}
                                </div>
                              </div>


                            
                            <div>
                                {!! Form::submit('Guardar',['class' => 'btn btn-primary']) !!}
                            </div>
                        {!! Form::close() !!}
                 </div>
              
               </div>
             </div>
         </div>
@stop