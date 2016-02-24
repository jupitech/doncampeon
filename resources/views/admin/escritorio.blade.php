@extends('admin/layout')

@section('content')
<?php
   $redis= Illuminate\Support\Facades\Redis::connection();
   $logs= $redis->keys('log_login:*');
   //print_r($logs);
?>
     <div class="col-sm-12">
      			<h1 class="page-header">
      			 <div class="col-sm-6 spi spd">
		                  Escritorio
		             </div>
		            <div class="col-sm-6 spi spd">
              		 </div>
      			</h1>
      			<div class="col-sm-12 spd spi">
      			<div class="col-sm-8 spi spd">
		      				<div class="col-sm-6">
		      					<div class="caja_section caja_escritorio">
		      					<h1 class="tit_cescri">Retos Realizados</h1>
		      					</div>
		      				</div>
		      				<div class="col-sm-6">
		      					<div class="caja_section caja_escritorio">
		      					<h1 class="tit_cescri">Top Partidos</h1>
		      					</div>
		      				</div>
      				</div>
      				<div class="col-sm-4 spd">
      					<div class="caja_section caja_escrilogue">
		      					<h1 class="tit_cescri">Campeones Logueados</h1>
		      					<table id="tabledonc" class="ul_log table dataTable" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>Email</th>
											<th>Username</th>
											<th>Login</th>
										</tr>
									</thead>
		      					 	@foreach($logs as $log)
		      					 	<tr>
		      					 	<?php
		      					 	  $keyl=$redis->hgetall($log);
		      					 	?>

		      					 		@foreach($keyl as $key)
											<td class="col-xs-4 col-md-4 col-sm-4 spd spi">{{$key}}</td>
		      					 		@endforeach
		      					 	</tr>
		      					 	 	@endforeach	
		      					</table>
		      					</div>
      				</div>
      			</div>
		          
          </div>

          <script>
  jQuery(document).ready( function ($) {
      $('#tabledonc').dataTable( {
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.10/i18n/Spanish.json"
            },
              "order": [[ 2, "desc" ]],
        "info":     false,
        "searching": false
        } );
} );
</script>
@stop