@extends('admin/layout')

@section('content')
<?php
		
	
		
 ?>
   @include('admin.sections.menutukis')
		<div class="col-sm-12">
      			<h1 class="page-header">
			            <div class="col-sm-6 spi spd">
			                  Paquetes de Tukis
			             </div>
			            <div class="col-sm-6 spi spd">
			               <div class="lbotones">
			                  <a href="{{ URL::to('tukis/paquetes/create') }}" type="button" class="btn btn-donc-nuevo" aria-label="Left Align" ><span class="glyphicon glyphicon-file" aria-hidden="true"></span>  Nuevo Paquete</a>

			               </div>
			               </div>

			      </h1>
		          <div class="col-sm-12 col-md-12 col-lg-8 spi spd">
				          <div class="caja_section">
						          <div class="col-sm-12">
						             @if(Session::has('message'))
									  <div class="col-sm-12">
									  	<div class="alert alert-success alert-dismissible" role="alert">
											  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											  {{Session::get('message')}}
											</div>
									  </div>
				                      
									@endif
						           <table id="tabledonc" class="table dataTable" cellspacing="0" width="100%">
								                  	<thead>
								                  	<tr></th>
								                  		<th>Nombre</th>
								                      	<th>Tukis</th>
								                  		<th>Cantidad Max</th>
								                  		<th>Monto $</th>
								                  		<th>Monto Q</th>
								                  		<th>% Fee</th>
								                  		<th>Neto $</th>
								                  		<th>Neto Q</th>
								                  		<th>Activado</th>
								                  	</tr>
								                  	</thead>
								                  	<tbody>
								                  	@foreach($paquetetukis as $paquetetuki)
								                  	<tr>
								                      <td>{{$paquetetuki->nombre_paquete}}</td>
								                  	  <td>{{$paquetetuki->tukis_paquete}}</td>
								                  	  <td>{{$paquetetuki->cantidad_max}}</td>
								                  	  <td>${{$paquetetuki->monto_dolar}}</td>
								                  	  <td>Q{{$paquetetuki->monto_quetzal}}</td>	
								                  	  <td>{{$paquetetuki->fee_paquete}}</td>
								                  	  <td>${{$paquetetuki->neto_dolar}}</td>
								                  	  <td>Q{{$paquetetuki->neto_quetzal}}</td>	
								                  	  <td></td>	
								                  	</tr>
								                  	@endforeach	
								                  	</tbody>
								                  </table>	 

						          </div>
				        
				          		
				          </div>
		          </div>

		          <script>
					  jQuery(document).ready( function ($) {
					      $('#tabledonc').dataTable( {
					            "language": {
					                "url": "//cdn.datatables.net/plug-ins/1.10.10/i18n/Spanish.json"
					            },
					              "info":     false
					        } );
					} );
					</script>
          </div>

@stop