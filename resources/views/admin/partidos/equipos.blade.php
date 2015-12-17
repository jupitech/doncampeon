@extends('admin/layout')

@section('content')
      <h1 class="page-header">Equipos</h1>
        <div class="col-sm-7 spi">
          <div class="col-sm-12 spi spd">
         <div class="lbotones">
            <a href="http://doncampeon.app/equipos/create" type="button" class="btn btn-donc-nuevo" aria-label="Left Align" ><span class="glyphicon glyphicon-file" aria-hidden="true"></span>  Nuevo Equipo</a>
             <a href="http://doncampeon.app/ligas" type="button" class="btn btn-donc-enlaces" aria-label="Left Align" > Ligas</a>
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
                  		<th>Liga</th>
                  		<th>Pais</th>
                  		<th>Opciones</th>
                  	</tr>
                  	</thead>
                  	<tbody>
                  	@foreach($equipos as $equipo)
                  	<tr>
                  		<td>{{$equipo->nombre_equipo}}</td>
                  		<td>{{$equipo->getLigasNombre()}}</td>
                  		<td>{{$equipo->pais_equipo}}</td>
                  		<td></td>
                  	</tr>
                  	@endforeach	
                  	</tbody>
                  </table>

         	 </div>
        </div>
@stop