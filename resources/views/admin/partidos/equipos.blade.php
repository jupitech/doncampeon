@extends('admin/layout')

@section('content')
     @include('admin.sections.menuequipos')
      <div class="col-sm-12">
      <h1 class="page-header">
            <div class="col-sm-6 spi spd">
                  Equipos
             </div>
            <div class="col-sm-6 spi spd">
               <div class="lbotones">
                  <a href="{{ URL::to('equipos/create') }}" type="button" class="btn btn-donc-nuevo" aria-label="Left Align" ><span class="glyphicon glyphicon-file" aria-hidden="true"></span>  Nuevo Equipo</a>
                  
               </div>
               </div>

      </h1>
        <div class="col-lg-8 col-md-12 col-sm-12 col-sx-12 spi spd">
          
         	 <div class="caja_section">
          @if(Session::has('message'))
                      <div class="col-sm-12">
                        <div class="alert alert-success alert-dismissible" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          {{Session::get('message')}}
                        </div>
                      </div>
                                
                    @endif
              <?php
                    $laliga=\Doncampeon\Models\Ligas::orderBy('id','ASC')->lists('nombre_liga','id');
                    $equiposnacionales=\Doncampeon\Models\Equipos::where('pais_equipo','1')->get();
                    $equiposinternacionales=\Doncampeon\Models\Equipos::where('pais_equipo','>','1')->get();
                    ?> 

           <!-- Nav tabs -->
          <ul class="tab_donc nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#todos" aria-controls="todos" role="tab" data-toggle="tab">Todos</a></li>
            <li role="presentation"><a href="#nacionales" aria-controls="nacionales" role="tab" data-toggle="tab">Nacionales</a></li>
            <li role="presentation"><a href="#internacionales" aria-controls="internacionales" role="tab" data-toggle="tab">Internacionales</a></li>
          </ul>   
          

           <div class="tab-content">
               <div role="tabpanel" class="tab-pane active" id="todos">

                  <table id="tabledonc" class="table dataTable" cellspacing="0" width="100%">
                  	<thead>
                  	<tr>
                     <th>Camisola</th>
                  		<th>Equipo</th>
                  		<th>Alias</th>
                  		<th>Pais</th>
                      <th>Ligas asignadas</th>
                  		<th>Opciones</th>
                  	</tr>
                  	</thead>
                  	<tbody>
                  	@foreach($equipos as $equipo)
                  	<tr>
                       <td class="area_camisola"><p class="img-camisola" style="background: #eee url('../assets/img/{{$equipo->alias}}.svg') no-repeat center bottom !important; background-size: 40px;"></p></td>
                  		<td><p class="prin_td">{{$equipo->nombre_equipo}}</p></td>
                  		<td>{{$equipo->alias}}</td>
                  		<td>{{$equipo->getPaisNombre()}}</td>
                      <td>
                       @foreach($equipo->getLigasEquipo($equipo->id) as $ligaequipo)
                            | {{$ligaequipo->Nombreliga->nombre_liga}}
                       @endforeach
                      </td>
                  		<td>
                              <span class="ico_op">
                                <a class="btn btn-donc-editar" data-toggle="modal" data-target=".modal-{{$equipo->id}}">Ligas</a>
                                    
                                <div class="modal fade modal-{{$equipo->id}}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                              <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="gridSystemModalLabel">Equipo {{$equipo->nombre_equipo}}</h4>
                                              </div>
                                              <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                            {!! Form::open(['route'=>'storeligas','method'=>'POST']) !!}

                                                                  <div class="form-group">
                                                                  <div class="col-sm-2">
                                                                     <label class="label-modal">Liga</label>
                                                                  </div>
                                                                  <div class="col-sm-10">
                                                                      {!! Form::select('ligas_id',$equipo->getLigasSin(), null, ['class'=> 'form-control selectpicker','data-live-search'=>'Ingresa nombre de la liga']) !!}
                                                                       {!! Form::hidden('equipos_id',$equipo->id, null, ['class'=> 'form-control','placeholder'=>'Ingresa alias']) !!}
                                                                  </div>
                                                                  </div>
                                                                  

                                                                  <div>
                                                                      {!! Form::submit('Asignar',['class' => 'btn btn-primary']) !!}
                                                                  </div>
                                                              {!! Form::close() !!}
                                                    </div>
                                                    <div class="col-sm-12">
                                                       <table class="table">
                                                       <thead>
                                                         <tr>
                                                             <th>Ligas asignadas</th>
                                                             <th></th>
                                                         </tr>
                                                       </thead>
                                                       @foreach($equipo->getLigasEquipo($equipo->id) as $ligaequipo)
                                                         <tr>
                                                           <td>{{$ligaequipo->Nombreliga->nombre_liga}}</td>
                                                           <td>
                                                             <span class="ico_op dropdown">
                                                                  <a class="btn btn-donc-eliminar glyphicon drop_delete glyphicon-resize-full" data-toggle="dropdown"></a>
                                                                <ul class="dropdown-menu dropdown-menu-op">
                                                                        <li>
                                                                        <p>
                                                                                {!! Form::open(['route'=>['destroyliga',$ligaequipo->id],'method'=>'DELETE']) !!}
                                                                                      {!! Form::submit('Desasignar',['class' => 'btn btn-donc-danger']) !!}
                                                                                {!! Form::close() !!}
                                                                            </p>
                                                                         <p> {{$ligaequipo->Nombreliga->nombre_liga}}</p>
                                                                        </li>
                                                                    </ul>

                                                            </span>
                                                           </td>
                                                         </tr>
                                                          @endforeach
                                                       </table>
                                                      
                                                    </div>
                                                </div>
                                              </div>
                                      </div>
                                    </div>
                                  </div>


                              </span>
                              <span class="ico_op">
                                   {!!link_to_route('equipos.edit', $title = '', $parameters = $equipo->id, $attributes = ['class'=>'btn btn-donc-editar glyphicon glyphicon-pencil'])!!}
                              </span>
                              <span class="ico_op dropdown">
                                    <a class="btn btn-donc-eliminar glyphicon drop_delete glyphicon-remove" data-toggle="dropdown"></a>
                                  <ul class="dropdown-menu dropdown-menu-op">
                                          <li>
                                          <p>
                                                  {!! Form::open(['route'=>['equipos.destroy',$equipo->id],'method'=>'DELETE']) !!}
                                                        {!! Form::submit('Eliminar',['class' => 'btn btn-donc-danger']) !!}
                                                  {!! Form::close() !!}
                                              </p>
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
                <div role="tabpanel" class="tab-pane" id="nacionales">
                    <table id="tabledonc2" class="table dataTable" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                     <th>Camisola</th>
                      <th>Equipo</th>
                      <th>Alias</th>
                      <th>Pais</th>
                      <th>Ligas asignadas</th>
                      <th>Opciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($equiposnacionales as $equipo)
                    <tr>
                      <td class="area_camisola"><p class="img-camisola" style="background: #eee url('../assets/img/{{$equipo->alias}}.svg') no-repeat center bottom !important; background-size: 40px;"></p></td>
                      <td><p class="prin_td">{{$equipo->nombre_equipo}}</p></td>
                      <td>{{$equipo->alias}}</td>
                      <td>{{$equipo->getPaisNombre()}}</td>
                      <td>
                         @foreach($equipo->getLigasEquipo($equipo->id) as $ligaequipo)
                            | {{$ligaequipo->Nombreliga->nombre_liga}}
                       @endforeach

                      </td>
                      <td>
                              <span class="ico_op">
                                <a class="btn btn-donc-editar" data-toggle="modal" data-target=".modal1-{{$equipo->id}}">Ligas</a>
                                    
                                <div class="modal fade modal1-{{$equipo->id}}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                              <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="gridSystemModalLabel">Equipo {{$equipo->nombre_equipo}}</h4>
                                              </div>
                                              <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                            {!! Form::open(['route'=>'storeligas','method'=>'POST']) !!}

                                                                  <div class="form-group">
                                                                  <div class="col-sm-2">
                                                                    <label class="label-modal">Liga</label>
                                                                  </div>
                                                                  <div class="col-sm-10">
                                                                      {!! Form::select('ligas_id',$equipo->getLigasSin(), null, ['class'=> 'form-control selectpicker','data-live-search'=>'Ingresa nombre de la liga']) !!}
                                                                       {!! Form::hidden('equipos_id',$equipo->id, null, ['class'=> 'form-control','placeholder'=>'Ingresa alias']) !!}
                                                                  </div>
                                                                  </div>
                                                                  

                                                                  <div>
                                                                      {!! Form::submit('Asignar',['class' => 'btn btn-primary']) !!}
                                                                  </div>
                                                              {!! Form::close() !!}
                                                    </div>
                                                    <div class="col-sm-12">
                                                       <table class="table">
                                                       <thead>
                                                         <tr>
                                                             <th>Ligas asignadas</th>
                                                               <th></th>
                                                         </tr>
                                                       </thead>
                                                       @foreach($equipo->getLigasEquipo($equipo->id) as $ligaequipo)
                                                         <tr>
                                                           <td>{{$ligaequipo->Nombreliga->nombre_liga}}</td>
                                                           <td>
                                                             <span class="ico_op dropdown">
                                                                  <a class="btn btn-donc-eliminar glyphicon drop_delete glyphicon-resize-full" data-toggle="dropdown"></a>
                                                                <ul class="dropdown-menu dropdown-menu-op">
                                                                        <li>
                                                                        <p>
                                                                                {!! Form::open(['route'=>['destroyliga',$ligaequipo->id],'method'=>'DELETE']) !!}
                                                                                      {!! Form::submit('Desasignar',['class' => 'btn btn-donc-danger']) !!}
                                                                                {!! Form::close() !!}
                                                                            </p>
                                                                         <p> {{$ligaequipo->Nombreliga->nombre_liga}}</p>
                                                                        </li>
                                                                    </ul>

                                                            </span>
                                                           </td>
                                                         </tr>
                                                          @endforeach
                                                       </table>
                                                      
                                                    </div>
                                                </div>
                                              </div>
                                      </div>
                                    </div>
                                  </div>


                              </span>
                              <span class="ico_op">
                                   {!!link_to_route('equipos.edit', $title = '', $parameters = $equipo->id, $attributes = ['class'=>'btn btn-donc-editar glyphicon glyphicon-pencil'])!!}
                              </span>
                              <span class="ico_op dropdown">
                                    <a class="btn btn-donc-eliminar glyphicon drop_delete glyphicon-remove" data-toggle="dropdown"></a>
                                  <ul class="dropdown-menu dropdown-menu-op">
                                          <li>
                                          <p>
                                                  {!! Form::open(['route'=>['equipos.destroy',$equipo->id],'method'=>'DELETE']) !!}
                                                        {!! Form::submit('Eliminar',['class' => 'btn btn-donc-danger']) !!}
                                                  {!! Form::close() !!}
                                              </p>
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
                <div role="tabpanel" class="tab-pane" id="internacionales">
                   <table id="tabledonc3" class="table dataTable" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                    <th>Camisola</th>
                      <th>Equipo</th>
                      <th>Alias</th>
                      <th>Pais</th>
                      <th>Ligas asignadas</th>
                      <th>Opciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($equiposinternacionales as $equipo)
                    <tr>
                      <td class="area_camisola"><p class="img-camisola" style="background: #eee url('../assets/img/{{$equipo->alias}}.svg') no-repeat center bottom !important; background-size: 40px;"></p></td>
                      <td><p class="prin_td">{{$equipo->nombre_equipo}}</p></td>
                      <td>{{$equipo->alias}}</td>
                      <td>{{$equipo->getPaisNombre()}}</td>
                      <td>
                         @foreach($equipo->getLigasEquipo($equipo->id) as $ligaequipo)
                            | {{$ligaequipo->Nombreliga->nombre_liga}}
                       @endforeach
                      </td>
                      <td>
                              <span class="ico_op">
                                <a class="btn btn-donc-editar" data-toggle="modal" data-target=".modal2-{{$equipo->id}}">Ligas</a>
                                    
                                <div class="modal fade modal2-{{$equipo->id}}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                              <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="gridSystemModalLabel">Equipo {{$equipo->nombre_equipo}}</h4>
                                              </div>
                                              <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                            {!! Form::open(['route'=>'storeligas','method'=>'POST']) !!}

                                                                  <div class="form-group">
                                                                  <div class="col-sm-2">
                                                                     <label class="label-modal">Liga</label>
                                                                  </div>
                                                                  <div class="col-sm-10">
                                                                      {!! Form::select('ligas_id',$equipo->getLigasSin(), null, ['class'=> 'form-control selectpicker','data-live-search'=>'Ingresa nombre de la liga']) !!}
                                                                       {!! Form::hidden('equipos_id',$equipo->id, null, ['class'=> 'form-control','placeholder'=>'Ingresa alias']) !!}
                                                                  </div>
                                                                  </div>
                                                                  

                                                                  <div>
                                                                      {!! Form::submit('Asignar',['class' => 'btn btn-primary']) !!}
                                                                  </div>
                                                              {!! Form::close() !!}
                                                    </div>
                                                    <div class="col-sm-12">
                                                       <table class="table">
                                                       <thead>
                                                         <tr>
                                                             <th>Ligas asignadas</th>
                                                               <th></th>
                                                         </tr>
                                                       </thead>
                                                       @foreach($equipo->getLigasEquipo($equipo->id) as $ligaequipo)
                                                         <tr>
                                                           <td>{{$ligaequipo->Nombreliga->nombre_liga}}</td>
                                                           <td>
                                                             <span class="ico_op dropdown">
                                                                  <a class="btn btn-donc-eliminar glyphicon drop_delete glyphicon-resize-full" data-toggle="dropdown"></a>
                                                                <ul class="dropdown-menu dropdown-menu-op">
                                                                        <li>
                                                                        <p>
                                                                                {!! Form::open(['route'=>['destroyliga',$ligaequipo->id],'method'=>'DELETE']) !!}
                                                                                      {!! Form::submit('Desasignar',['class' => 'btn btn-donc-danger']) !!}
                                                                                {!! Form::close() !!}
                                                                            </p>
                                                                         <p> {{$ligaequipo->Nombreliga->nombre_liga}}</p>
                                                                        </li>
                                                                    </ul>

                                                            </span>
                                                           </td>
                                                         </tr>
                                                          @endforeach
                                                       </table>
                                                      
                                                    </div>
                                                </div>
                                              </div>
                                      </div>
                                    </div>
                                  </div>


                              </span>
                              <span class="ico_op">
                                   {!!link_to_route('equipos.edit', $title = '', $parameters = $equipo->id, $attributes = ['class'=>'btn btn-donc-editar glyphicon glyphicon-pencil'])!!}
                              </span>
                              <span class="ico_op dropdown">
                                    <a class="btn btn-donc-eliminar glyphicon drop_delete glyphicon-remove" data-toggle="dropdown"></a>
                                  <ul class="dropdown-menu dropdown-menu-op">
                                          <li>
                                          <p>
                                                  {!! Form::open(['route'=>['equipos.destroy',$equipo->id],'method'=>'DELETE']) !!}
                                                        {!! Form::submit('Eliminar',['class' => 'btn btn-donc-danger']) !!}
                                                  {!! Form::close() !!}
                                              </p>
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

<script>
  jQuery(document).ready( function ($) {
      $('#tabledonc2').dataTable( {
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.10/i18n/Spanish.json"
            },
              "info":     false
        } );
} );
</script>

<script>
  jQuery(document).ready( function ($) {
      $('#tabledonc3').dataTable( {
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.10/i18n/Spanish.json"
            },
              "info":     false
        } );
} );
</script>

@stop