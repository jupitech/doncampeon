@extends('admin/layout')

@section('content')
<?php
    
     $user=\Doncampeon\User::all();
     $userpapelera=\Doncampeon\User::onlyTrashed()->get();
    
 ?>

     @include('admin.sections.menucampeones')
      <div class="col-sm-12">
      <h1 class="page-header"><span class="glyphicon-huevorojo" aria-hidden="true"></span>Campeones</h1>
        <div class="col-lg-8 col-md-10 col-sm-12 col-sx-12 spi spd">
         <div class="col-sm-12 spi spd">
             <div class="lbotones">
                <a type="button" class="btn btn-donc-nuevo" aria-label="Left Align" data-toggle="modal" data-target=".modal-campeon"><span class="glyphicon-huevoblanco" aria-hidden="true"></span>  Nuevo Campeón</a>
                

                <div class="modal fade modal-campeon" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                              <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="gridSystemModalLabel">Nuevo Campeón</h4>
                                              </div>
                                              <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-sm-12 caja_drop">
                                                          {!! Form::open(['route'=>'campeones.store','method'=>'POST','class' => 'form']) !!}
                                                                  <div class="col-lg-12 col-md-12 ">
                                                                                    <div class="form-group">
                                                                                        <label>Usuario</label>
                                                                                       {!! Form::input('text', 'username', '', ['class'=> 'form-control','placeholder'=>'Ingresa nombre']) !!}
                                                                                    </div>
                                                                              </div>
                                                                  <div class="col-lg-6 col-md-6 col-sm-6">
                                                                    <div class="form-group">
                                                                                    <label>Nombre</label>
                                                                                    {!! Form::text('first_name','', ['class'=> 'form-control','placeholder'=>'Ingresa nombre']) !!}
                                                                                </div>
                                                                  </div>
                                                                  <div class="col-lg-6 col-md-6 col-sm-6">
                                                                    <div class="form-group">
                                                                                    <label>Apellido</label>
                                                                                    {!! Form::text('last_name', '', ['class'=> 'form-control','placeholder'=>'Ingresa apellido']) !!}
                                                                                </div>
                                                                  </div>
                                                                            <div class="col-lg-12 col-md-12 ">
                                                                                <div class="form-group">
                                                                                    <label>Email</label>
                                                                                    {!! Form::email('email', '', ['class'=> 'form-control','placeholder'=>'Ingresa correo ejemplo@correo.com']) !!}
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                                                <div class="form-group">
                                                                                    <label>Password</label>
                                                                                    {!! Form::password('password', ['class'=> 'form-control','placeholder'=>'Ingresa password']) !!}
                                                                                </div>
                                                                            </div>
                                                                 <div class="col-lg-6 col-md-6 col-sm-6">
                                                                                <div class="form-group">
                                                                                    <label>Confirmar Password</label>
                                                                                    {!! Form::password('password_confirmation', ['class'=> 'form-control','placeholder'=>'Repite el password']) !!}
                                                                                </div>
                                                                            </div>

                                                                                               
                                                                            <div>
                                                                                {!! Form::submit('Guardar',['class' => 'btn btn-primary']) !!}
                                                                            </div>
                                                                        {!! Form::close() !!}
                                                      
                                                    </div>
                                                </div>
                                              </div>
                                      </div>
                                    </div>
                                  </div>

             </div>
         </div>
         	 <div class="caja_section">
                <table class="table">
                                              <thead>
                                              <tr>
                                                <th>Nombre</th>
                                                <th>Usuario</th>
                                                <th>Rol</th>
                                                <th>Nivel</th>
                                                <th>Opciones</th>
                                              </tr>
                                              </thead>
                                              <tbody>
                                              @foreach($user as $users)
                                              @if($users->getRolLevel()==4)
                                                        <tr>
                                                          <td>
                                                            <p class="prin_td">{{$users->getUserProfile()->first_name}} {{$users->getUserProfile()->last_name}}</p>
                                                          </td>
                                                          <td>{{$users->username}}({{$users->email}})</td>

                                                          <td>{{$users->getRolNombre()}}</td>
                                                          <td>{{$users->getRolLevel()}}</td>
                                                          <td>
                                                          @role('admin')
                                                                    <span class="ico_op">
                                                                       {!!link_to_route('usuarios.edit', $title = '', $parameters = $users->id, $attributes = ['class'=>'btn btn-donc-editar glyphicon glyphicon-pencil'])!!}
                                                                    </span>

                                                                    <span class="ico_op dropdown">
                                                                        <a class="btn btn-donc-eliminar glyphicon drop_delete glyphicon-remove" data-toggle="dropdown"></a>
                                                                      <ul class="dropdown-menu dropdown-menu-op">
                                                                              <li>
                                                                                  <p>
                                                                                      {!! Form::open(['route'=>['usuarios.destroy',$users->id],'method'=>'DELETE']) !!}
                                                                                            {!! Form::submit('Eliminar',['class' => 'btn btn-donc-danger']) !!}
                                                                                      {!! Form::close() !!}
                                                                                  </p>
                                                                                  <p> {{$users->username}}?</p>
                                                                               
                                                                              </li>
                                                                          </ul>

                                                                    </span>
                                                

                                                            @endrole

                                                           @role('editor')
                                                           @if($users->getRolLevel()!=1)
                                                                    <span class="ico_op">
                                                                       {!!link_to_route('usuarios.edit', $title = '', $parameters = $users->id, $attributes = ['class'=>'btn btn-donc-editar glyphicon glyphicon-pencil'])!!}
                                                                    </span>
                                                            
                                                           @endif
                                                           @endrole

                                                          </td>
                                                        </tr>
                                                 @endif
                                              @endforeach 
                                              </tbody>
                                            </table>

         	 </div>
        </div>
        </div>
@stop