@extends('admin/layout')

@section('content')
   @include('admin.sections.menuequipos')
      <div class="col-sm-12">
              <h1 class="page-header">Editar Liga</h1>
                 <div class="col-sm-6 spi">
                 	 <div class="caja_section">
                 	  @include('admin.sections.errors')
                            {!! Form::model($ligas,['route'=>['ligas.update',$ligas->id],'method'=>'PUT']) !!}

                                <div class="form-group">
                                    <label>Nombre</label>
                                    {!! Form::text('nombre_liga', null, ['class'=> 'form-control','placeholder'=>'Ingresa nombre de la Liga']) !!}
                                </div>
                                

                                <div>
                                    {!! Form::submit('Editar',['class' => 'btn btn-primary']) !!}
                                </div>
                            {!! Form::close() !!}
                     
                  
                 	 </div>
                 </div>
         </div>
@stop