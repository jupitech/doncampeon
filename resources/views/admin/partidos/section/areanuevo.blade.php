<div class="area_btn_partido">

						  {!! Form::open(['route'=>['partidos.create'],'method'=>'GET']) !!}
						  <div class="col-lg-7 col-sm-6 spi spd">
						  	  {!! Form::select('ligas_id',$laliga, null, ['class'=> 'form-control selectpicker','data-live-search'=>'Ingresa nombre de la liga']) !!}
						  </div>
						  <div class="col-lg-5 col-sm-6 spi spd">
						  		{!! Form::submit('Nuevo partido',['class' => ' btn_partido btn btn-donc-nuevo']) !!}
						  </div>
						   
                          
                    		{!! Form::close() !!}

		                  
		               </div>