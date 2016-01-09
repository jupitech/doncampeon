@extends('admin/layout')

@section('content')
     @include('admin.sections.menuequipos')
      <div class="col-sm-12">
      <h1 class="page-header">
     <div class="col-sm-6 spi spd">
      Probabilidades
      </div>
      <div class="col-sm-6 spi spd">
         <div class="lbotones">
            <a href="{{ URL::to('probabilidades/create') }}" type="button" class="btn btn-donc-nuevo" aria-label="Left Align" ><span class="glyphicon glyphicon-file" aria-hidden="true"></span>  Nueva Probabilidad</a>
             
         </div>
         </div>

      </h1>
        <div class="col-lg-12 col-md-12 col-sm-12 col-sx-12 spi spd">
        @if(Session::has('message'))
            <div class="col-sm-12">
              <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                {{Session::get('message')}}
              </div>
            </div>
                      
          @endif
          
         	 <div class="col-sm-12 spd spi">
                @foreach($ligas as $liga)
                 <div class="col-lg-4 col-md-6 col-sm-6">
                              <div class="caja_section caja_proba">
                                          <h3>{{$liga->nombre_liga}}</h3>
                                          <div class="area_probabilidades">
                                               <table class="table">
                                                  <thead>
                                                  <tr>
                                                      <th>Pago</th>
                                                       <th>Casa</th>
                                                      <th>Visita</th>
                                                       <th>Parti.</th>
                                                      <th>P%</th>
                                                     
                                                      <th></th>
                                                  </tr>
                                                  </thead>
                                                  <tbody>
                                                  <?php 
                                                        $probabilidades=\Doncampeon\Models\ProbabilidadesLigas::where('ligas_id',$liga->id)->get();
                                                   ?>
                                                  @foreach($probabilidades as $probabilidad)
                                                  <tr class="fondopro_{{$probabilidad->duplicador}}">
                                                     <td class="td_pago">{{$probabilidad->duplicador}}X</td>
                                                    <td><p class="first_td">{{$probabilidad->marcador_casa}}</p> </td>
                                                    <td>{{$probabilidad->marcador_visita}}</td>
                                                    <td>{{$probabilidad->no_partidos}}</td>
                                                     <td>{{$probabilidad->probabilidad_por}}%</td>
                                                      
                                                    <td>
                                                      <span class="ico_op">
                                                         {!!link_to_route('ligas.edit', $title = '', $parameters = $liga->id, $attributes = ['class'=>'btn btn-donc-editar glyphicon glyphicon-pencil'])!!}
                                                      </span>
                                                      <span class="ico_op dropdown">
                                                          <a class="btn btn-donc-eliminar glyphicon drop_delete glyphicon-remove" data-toggle="dropdown"></a>
                                                        <ul class="dropdown-menu dropdown-menu-op">
                                                                <li>
                                                                    <p>
                                                                        {!! Form::open(['route'=>['probabilidades.destroy',$probabilidad->id],'method'=>'DELETE']) !!}
                                                                              {!! Form::submit('Eliminar',['class' => 'btn btn-donc-danger']) !!}
                                                                        {!! Form::close() !!}
                                                                    </p>
                                                                    <p> {{$probabilidad->marcador_casa}} a {{$probabilidad->marcador_visita}}</p>
                                                                 
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

                @endforeach

         	 </div>
        </div>
        </div>
@stop