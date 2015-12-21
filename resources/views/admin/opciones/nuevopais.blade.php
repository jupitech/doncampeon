@extends('admin/layout')

@section('content')
      <h1 class="page-header">Nuevo Pais</h1>
         <div class="col-sm-6 spi">
         	 <div class="caja_section">
         	 
                    {!! Form::open(['route'=>'pais.store','method'=>'POST']) !!}

                        <div class="form-group">
                            <label>Nombre</label>
                            {!! Form::text('nombre', null, ['class'=> 'form-control','placeholder'=>'Ingresa nombre del pais']) !!}
                        </div>
                        

                        <div>
                            {!! Form::submit('Guardar',['class' => 'btn btn-primary']) !!}
                        </div>
                    {!! Form::close() !!}
             
          
         	 </div>
         </div>
@stop