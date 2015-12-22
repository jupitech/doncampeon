@extends('admin/layout')

@section('content')
 <div class="col-sm-12">
      <h1 class="page-header">Editar Pais</h1>
         <div class="col-sm-6 spi">
         	 <div class="caja_section">
         	  <div class="col-sm-12">
                    {!!Form::model($pais,['route'=>['pais.update',$pais->id],'method'=>'PUT']) !!}

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
         </div>
         </div>
@stop