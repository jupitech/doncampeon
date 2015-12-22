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
                      $elpais=\Doncampeon\Models\Pais::orderBy('id','ASC')->lists('nombre','id');
                      ?>
                        {!! Form::open(['route'=>'equipos.store','method'=>'POST']) !!}

                            <div class="form-group">
                                <label>Nombre</label>
                                {!! Form::text('nombre_equipo', null, ['class'=> 'form-control','placeholder'=>'Ingresa nombre del equipo']) !!}
                            </div>
                             <div class="form-group">
                                <label>Alias</label>
                                {!! Form::text('alias', null, ['class'=> 'form-control','placeholder'=>'Ingresa alias']) !!}
                            </div>
                             <div class="col-sm-12 spd spi">
                                    <div class="col-sm-5 spd spi">
                                        <div class="form-group">
                                        <label>Pais</label>
                                       {!! Form::select('pais_equipo',$elpais, null, ['class'=> 'form-control selectpicker','data-live-search'=>'Ingresa nombre del pais']) !!}
                                    </div>
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