@extends('admin/layout')

@section('content')
 <div class="col-sm-12">
      <h1 class="page-header">Paises</h1>
        <div class="col-sm-6 spi spd">
        <div class="col-sm-12 spi spd">
         <div class="lbotones">
            <a href="{{ URL::to('pais/create') }}" type="button" class="btn btn-donc-nuevo" aria-label="Left Align" ><span class="glyphicon glyphicon-file" aria-hidden="true"></span>  Nuevo Pais</a>
         </div>
         </div>
         	 <div class="caja_section">
         @if(Session::has('message'))
                  <div class="col-sm-12 spd spi">
                    <div class="alert alert-success alert-dismissible" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      {{Session::get('message')}}
                    </div>
                  </div>
                            
                @endif
                  <table class="table">
                  	<thead>
                  	<tr>
                  		<th>Pais</th>
                  		<th>Opciones</th>
                  	</tr>
                  	</thead>
                  	<tbody>
                  	@foreach($pais as $paises)
                  	<tr>
                  		<td>{{$paises->nombre}}</td>
                  		<td>
                        <span class="ico_op">
                           {!!link_to_route('pais.edit', $title = '', $parameters = $paises->id, $attributes = ['class'=>'btn btn-donc-editar glyphicon glyphicon-pencil'])!!}
                        </span>
                        <span class="ico_op dropdown">
                            <a class="btn btn-donc-eliminar glyphicon drop_delete glyphicon-remove" data-toggle="dropdown"></a>
                          <ul class="dropdown-menu dropdown-menu-op">
                                  <li>
                                  <p>
                                          {!! Form::open(['route'=>['pais.destroy',$paises->id],'method'=>'DELETE']) !!}
                                                {!! Form::submit('Eliminar',['class' => 'btn btn-donc-danger']) !!}
                                          {!! Form::close() !!}
                                      </p>
                                   <p> {{$paises->nombre}}</p>
                                  </li>
                              </ul>

                        </span>


                      </td>
                  	</tr>
                  	@endforeach	
                  	</tbody>
                  </table>

         	 </div>
        </div>
        </div>
@stop