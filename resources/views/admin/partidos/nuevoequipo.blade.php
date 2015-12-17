@extends('admin/layout')

@section('content')
      <h1 class="page-header">Nuevo Equipo</h1>
         <div class="col-sm-6 spi">
         	 <div class="caja_section">
         	      <?php
                  $lasligas=\Doncampeon\Models\Ligas::orderBy('nombre_liga','DESC')->lists('nombre_liga','id');
                  ?>
                    {!! Form::open(['route'=>'equipos.store','method'=>'POST']) !!}

                        <div class="form-group">
                            <label>Nombre</label>
                            {!! Form::text('nombre_equipo', null, ['class'=> 'form-control','placeholder'=>'Ingresa nombre del equipo']) !!}
                        </div>
                         <div class="col-sm-12 spd spi">
                                <div class="col-sm-5 spd spi">
                                    <div class="form-group">
                                    <label>Liga</label>
                                   {!! Form::select('liga_equipo',$lasligas, null, ['class'=> 'form-control selectpicker','data-live-search'=>'Ingresa nombre del equipo']) !!}
                                </div>
                                </div>
                               
                            
                        </div>

                         
                          <div class="form-group">
                            <label>Pais</label>
                            {!! Form::text('pais_equipo',null, ['class'=> 'form-control']) !!}
                        </div>

                        <div>
                            {!! Form::submit('Guardar',['class' => 'btn btn-primary']) !!}
                        </div>
                    {!! Form::close() !!}
             
          
         	 </div>
         </div>
@stop