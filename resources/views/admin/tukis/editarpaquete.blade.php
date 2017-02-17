@extends('admin/layout')

@section('content')
 @include('admin.sections.menutukis')
      <div class="col-sm-12">
          <h1 class="page-header">Nuevo Paquete de Tukis</h1>
             <div class="col-sm-10 col-lg-6 spi">
             	 <div class="caja_section">
                  <div class="col-sm-12">
                 	 @include('admin.sections.errors')

                            {!! Form::model($paquetetukis,['route'=>['paquetes.update',$paquetetukis->id],'method'=>'PUT']) !!}
                                
                                <div class="col-sm-6">
                                       <div class="form-group">
                                        <label>Nombre del paquete</label>
                                        {!! Form::text('nombre_paquete', null, ['class'=> 'form-control','placeholder'=>'Ingresa nombre del tuki']) !!}
                                    </div>
                                </div>
                               <div class="col-sm-6">
                                       <div class="form-group">
                                        <label>Tukis Paquete</label>
                                        {!! Form::number('tukis_paquete', null, ['class'=> 'form-control']) !!}
                                    </div>
                                </div>
                                 <div class="col-sm-6">
                                       <div class="form-group">
                                        <label>Cantidad Max</label>
                                        {!! Form::number('cantidad_max', null, ['class'=> 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                       <div class="form-group">
                                        <label>Monto $</label>
                                        {!! Form::number('monto_dolar', null, ['class'=> 'form-control','step' => 'any']) !!}
                                    </div>
                                </div>
                                 <div class="col-sm-6">
                                       <div class="form-group">
                                        <label>Monto Q</label>
                                        {!! Form::number('monto_quetzal', null, ['class'=> 'form-control','step' => 'any']) !!}
                                    </div>
                                </div>
                                 <div class="col-sm-3">
                                       <div class="form-group">
                                        <label>% Fee(${{$paquetetukis->fee_paquete }})</label>
                                        {!! Form::number('fee_porcentaje', ($paquetetukis->fee_paquete*100)/$paquetetukis->monto_dolar, ['class'=> 'form-control']) !!}
                                    </div>
                                </div>
                                 <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Activado</label>
                                                {!! Form::select('paquete_activado', array('1' =>'Si','0' => 'No'),$paquetetukis->paquete_activado,['class'=> 'form-control']) !!}
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