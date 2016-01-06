@extends('admin/layout')

@section('content')
 @include('admin.sections.menujuego')
      <div class="col-sm-12">
          <h1 class="page-header">Nuevo Nivel del Juegos</h1>
             <div class="col-sm-6 spi">
             	 <div class="caja_section">
                  <div class="col-sm-12">
                 	 @include('admin.sections.errors')

                            {!! Form::open(['route'=>'juego.store','method'=>'POST']) !!}
                                
                                <div class="col-sm-6">
                                       <div class="form-group">
                                        <label>Nombre</label>
                                        {!! Form::text('nivel_nombre', null, ['class'=> 'form-control','placeholder'=>'Ingresa nombre del nivel']) !!}
                                    </div>
                                </div>
                               <div class="col-sm-6">
                                       <div class="form-group">
                                        <label>Alias</label>
                                        {!! Form::text('nivel_alias', null, ['class'=> 'form-control','placeholder'=>'Ingresa alias']) !!}
                                    </div>
                                </div>
                                 <div class="col-sm-6">
                                       <div class="form-group">
                                        <label>Puntos del nivel</label>
                                        {!! Form::number('nivel_puntos', null, ['class'=> 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                       <div class="form-group">
                                        <label>Puntos del nivel mínimo</label>
                                        {!! Form::number('nivel_minimo', null, ['class'=> 'form-control']) !!}
                                    </div>
                                </div>
                                 <div class="col-sm-6">
                                       <div class="form-group">
                                        <label>Puntos bonificados</label>
                                        {!! Form::number('nivel_bonus', null, ['class'=> 'form-control']) !!}
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