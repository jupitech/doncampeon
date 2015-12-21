@extends('admin/layout')

@section('content')
      <h1 class="page-header">Paises</h1>
        <div class="col-sm-7 spi">
        <div class="col-sm-12 spi spd">
         <div class="lbotones">
            <a href="{{ URL::to('pais/create') }}" type="button" class="btn btn-donc-nuevo" aria-label="Left Align" ><span class="glyphicon glyphicon-file" aria-hidden="true"></span>  Nuevo Pais</a>
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
							  Pais <strong>Guardado!</strong> exitosamente.
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
                  		<td></td>
                  	</tr>
                  	@endforeach	
                  	</tbody>
                  </table>

         	 </div>
        </div>
@stop