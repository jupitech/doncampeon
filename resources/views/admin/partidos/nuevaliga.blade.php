@extends('admin/layout')

@section('content')
      <h1 class="page-header">Nueva Liga</h1>
         <div class="col-sm-6 spi">
         	 <div class="caja_section">
         	 
                    {!! Form::open(['route'=>'ligas.store','method'=>'POST']) !!}

                        <div class="form-group">
                            <label>Nombre</label>
                            {!! Form::text('nombre_liga', null, ['class'=> 'form-control','placeholder'=>'Ingresa nombre de la Liga']) !!}
                        </div>
                        

                        <div>
                            {!! Form::submit('Guardar',['class' => 'btn btn-primary']) !!}
                        </div>
                    {!! Form::close() !!}
             
          
         	 </div>
         </div>
@stop