@extends('admin/layout')

@section('content')
     @include('admin.sections.menuequipos')
      <div class="col-sm-12">
      <h1 class="page-header">Equipos</h1>
        <div class="col-sm-7 spi">
          <div class="col-sm-12 spi spd">
         <div class="lbotones">
            <a href="{{ URL::to('equipos/create') }}" type="button" class="btn btn-donc-nuevo" aria-label="Left Align" ><span class="glyphicon glyphicon-file" aria-hidden="true"></span>  Nuevo Equipo</a>
            
         </div>
         </div>
         	 <div class="caja_section">

					<?php
					$mensaje=Session::get('message');
					?>
					@if($mensaje=='store')
					  <div class="col-sm-12 spd spi">
					  	<div class="alert alert-success alert-dismissible" role="alert">
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							  Equipo <strong>Guardado!</strong> exitosamente.
							</div>
					  </div>
                      
					@endif
                  <table class="table">
                  	<thead>
                  	<tr>
                  		<th>Equipo</th>
                  		<th>Alias</th>
                  		<th>Pais</th>
                  		<th>Opciones</th>
                  	</tr>
                  	</thead>
                  	<tbody>
                  	@foreach($equipos as $equipo)
                  	<tr>
                  		<td>{{$equipo->nombre_equipo}}</td>
                  		<td>{{$equipo->alias}}</td>
                  		<td>{{$equipo->getPaisNombre()}}</td>
                  		<td>
                      <span class="ico_op">
                           {!!link_to_route('equipos.edit', $title = '', $parameters = $equipo->id, $attributes = ['class'=>'btn btn-donc-editar glyphicon glyphicon-pencil'])!!}
                        </span>
                        <span class="ico_op dropdown">
                            <a class="btn btn-donc-eliminar glyphicon drop_delete glyphicon-remove" data-toggle="dropdown"></a>
                          <ul class="dropdown-menu dropdown-menu-op">
                                  <li>
                                  <p><a href="{{ route('logout')}}" class="btn btn-donc-danger">Eliminar</a></p>
                                   <p> {{$equipo->nombre_equipo}}</p>
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