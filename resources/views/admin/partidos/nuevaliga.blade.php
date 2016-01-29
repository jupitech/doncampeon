@extends('admin/layout')

@section('content')
  @include('admin.sections.menuequipos')
      <div class="col-sm-12">
          <h1 class="page-header">Nueva Liga</h1>
             <div class="col-sm-6 spi">
             	 <div class="caja_section">
                  <div class="col-sm-12">
                 	 @include('admin.sections.errors')

                            {!! Form::open(['route'=>'ligas.store','method'=>'POST']) !!}

                                <div class="form-group">
                                    <label>Nombre</label>
                                    {!! Form::text('nombre_liga', null, ['class'=> 'form-control','placeholder'=>'Ingresa nombre de la Liga']) !!}
                                </div>
                                <div class="form-group">
                                    <label>Alias</label>
                                    {!! Form::text('alias', null, ['class'=> 'form-control','placeholder'=>'Ingresa el alias']) !!}
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