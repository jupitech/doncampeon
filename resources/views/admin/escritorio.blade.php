@extends('admin/layout')

@section('content')
<?php
use Carbon\Carbon;

   $redis= Illuminate\Support\Facades\Redis::connection();
   $logs= $redis->keys('log_login:*');
   $ahora=Carbon::now();
   $hoy=Carbon::today();
   $ayer=Carbon::today()->subDay(1);
   $mañana=Carbon::today()->addDay(1);
   $imes=Carbon::today()->startOfMonth();
   $fmes=Carbon::today()->endOfMonth();
   //print_r($logs);
   $contahoy=0;
   $contaayer=0;
   $contames=0;
?>
     <div class="col-sm-12">
      			<h1 class="page-header">
      			 <div class="col-sm-6 spi spd">
		                  Escritorio
		             </div>
		            <div class="col-sm-6 spi spd">
              		 </div>
      			</h1>
      			<div class="col-sm-12 col-lg-12 spd spi">
      			<div class="col-sm-12 col-md-12 col-lg-8 spi spd">
		      				<div class="col-sm-12 col-md-6 col-lg-6">
		      					<div class="caja_section caja_escritorio">
		      					<h1 class="tit_cescri">Retos Realizados</h1>
		      					
		      					</div>
		      				</div>
		      				<div class="col-sm-12 col-md-6 col-lg-6">
		      					<div class="caja_section caja_escritorio">
		      					<h1 class="tit_cescri">Top Partidos</h1>
		      					</div>
		      				</div>

      				</div>
      				<div class="col-sm-12 col-md-6 col-lg-4 ">
      					<div class="caja_section caja_escrilogue">
		      					<h1 class="tit_cescri">Campeones Logueados <span>{{$ahora}}</span></h1>
		      					<div class="area_contalog">
												<div class="col-sm-4 spd spi">
													<h3>HOY</h3>
													<span>	
													@foreach($logs as $log)
															<?php
															$key_login=$redis->hget($log,'login');
															if($key_login>=$hoy and $key_login<=$mañana){
																$contahoy++;														
															}

															?>

															@endforeach	
															{{$contahoy}}
													</span>
												</div>
												<div class="col-sm-4 spd spi">
													<h3>AYER</h3>
													<span>	
													@foreach($logs as $log)
															<?php
															$key_login2=$redis->hget($log,'login');
																if($key_login2>$ayer and $key_login2<$hoy){
																$contaayer++;														
															}

															?>

															@endforeach	
															{{$contaayer}}
													</span>
												</div>
												<div class="col-sm-4 spd spi">
													<h3>MES</h3>
													<span>	
													@foreach($logs as $log)
															<?php
															$key_login2=$redis->hget($log,'login');
																if($key_login2>$imes and $key_login2<$fmes){
																$contames++;														
															}

															?>

															@endforeach	
															{{$contames}}
													</span>
												</div>
		      					</div>
		      					<table id="tabledonc" class="ul_log table dataTable" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>Login</th>
											<th>Username</th>
											<th>Email</th>
										</tr>
									</thead>
		      					 	@foreach($logs as $log)
		      					 	<tr>
		      					 	<?php
		      					 	  $key_email=$redis->hget($log,'email');
		      					 	  $key_username=$redis->hget($log,'username');
		      					 	  $key_login=$redis->hget($log,'login');
		      					 	 // if($key_login2>=$imes){
		      					 	?>
		      					 			<td class="time_log">{{$key_login}}</td>
		      					 			<td>{{$key_username}}</td>
											<td>{{$key_email}}</td>

									<?php	
									    //}	
		      							?>	
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
              "order": [[ 0, "desc" ]],
        "info":     false,
        "searching": false
        } );
} );
</script>
@stop