@extends('admin/layout')

@section('content')
<?php
		
	
		
 ?>
   @include('admin.sections.menuintegraciones')
		<div class="col-sm-12">
      			<div class="page-header">
      			 <div class="col-sm-6 spi spd">
      			 Pasarelas
      			 </div>
      			  <div class="col-sm-6 spi spd">
      			    <div class="lbotones">
							  	  <a type="button" class="btn btn-donc-nuevo" aria-label="Left Align" data-toggle="modal" data-target=".modal-campeon">  Nueva Pasarela</a>
							  </div>
      			 </div>
      			
      			</div>

		          <div class="col-lg-12 col-md-12 col-sm-12 col-sx-12 spi spd">
						
		          {{-- Contenido de Pasarelas --}}
				          <div class="caja_section">
				         
				          </div>
		          </div>
          </div>
@endsection

@push('scripts')
    <script src="/js/script.js"></script>
    <script src="/js/controller/PasarelasController.js"></script>
@endpush