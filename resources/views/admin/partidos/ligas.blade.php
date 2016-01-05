@extends('admin/layout')

@section('content')
     @include('admin.sections.menuequipos')
      <div class="col-sm-12">
      <h1 class="page-header">
     <div class="col-sm-6 spi spd">
      Ligas
      </div>
      <div class="col-sm-6 spi spd">
         <div class="lbotones">
            <a href="{{ URL::to('ligas/create') }}" type="button" class="btn btn-donc-nuevo" aria-label="Left Align" ><span class="glyphicon glyphicon-file" aria-hidden="true"></span>  Nueva Liga</a>
             
         </div>
         </div>

      </h1>
        <div class="col-lg-8 col-md-10 col-sm-12 col-sx-12 spi spd">
        
         	 <div class="caja_section">

					@if(Session::has('message'))
					  <div class="col-sm-12">
					  	<div class="alert alert-success alert-dismissible" role="alert">
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							  {{Session::get('message')}}
							</div>
					  </div>
                      
					@endif
                  <table class="table">
                  	<thead>
                  	<tr>
                  		<th>Liga</th>
                  		<th>Opciones</th>
                  	</tr>
                  	</thead>
                  	<tbody>
                  	@foreach($ligas as $liga)
                  	<tr>
                  		<td><p class="prin_td">{{$liga->nombre_liga}}</p></td>
                  		<td>
                        <span class="ico_op">
                           {!!link_to_route('ligas.edit', $title = '', $parameters = $liga->id, $attributes = ['class'=>'btn btn-donc-editar glyphicon glyphicon-pencil'])!!}
                        </span>
                        <span class="ico_op dropdown">
                            <a class="btn btn-donc-eliminar glyphicon drop_delete glyphicon-remove" data-toggle="dropdown"></a>
                          <ul class="dropdown-menu dropdown-menu-op">
                                  <li>
                                      <p>
                                          {!! Form::open(['route'=>['ligas.destroy',$liga->id],'method'=>'DELETE']) !!}
                                                {!! Form::submit('Eliminar',['class' => 'btn btn-donc-danger']) !!}
                                          {!! Form::close() !!}
                                      </p>
                                      <p> {{$liga->nombre_liga}}?</p>
                                   
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