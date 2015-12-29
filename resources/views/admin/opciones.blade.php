@extends('admin/layout')

@section('content')
<?php
		
		 $user=\Doncampeon\User::all();
      
    $roles=\Doncampeon\Models\Roles::whereNotIn('id',[4])->orderBy('id','ASC')->lists('name','id');
	$roleseditor=\Doncampeon\Models\Roles::whereNotIn('id',[1,4])->orderBy('id','ASC')->lists('name','id');
		
 ?>
		<div class="col-sm-12">
      			<h1 class="page-header">Opciones</h1>
		          <div class="col-sm-12 spi spd">
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
				          	 @include('admin.sections.errors')
				          </div>
				        
				          		<ul class="tab_donc nav nav-tabs" role="tablist">
						            <li role="presentation" class="active"><a href="#general" aria-controls="general" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-cog"></span> Generales</a></li>
						            <li role="presentation"><a href="#usuarios" aria-controls="usuarios" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-user"></span> Usuarios del Sistema</a></li>
						            <li role="presentation"><a href="#seguridad" aria-controls="seguridad" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-fire"></span> Seguridad</a></li>
						          </ul>  

						           <div class="tab-content">
              								 <div role="tabpanel" class="tab-pane active" id="general">
              								 </div>

              								 <div role="tabpanel" class="tab-pane" id="usuarios">
												<div class="col-lg-8 col-md-12">
													<strong><p>Listado de Usuarios</p></strong>
													<div class="col-sm-12">
														
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
													                        @endrole
																			@endif

													                      </td>
													                  	</tr>
													                  	@endforeach	
													                  	</tbody>
													                  </table>


													</div>	


												</div>
												<div class="col-lg-4 col-md-12">
													<strong><p>Nuevo Usuario</p></strong>
													
													<div class="col-sm-12">
														 {!! Form::open(['route'=>'usuarios.store','method'=>'POST','class' => 'form']) !!}
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

                                                                <div class="form-group">
                                                                  <div class="col-sm-2">
                                                                     <label class="label-modal">Rol</label>
                                                                  </div>
                                                                  <div class="col-sm-10">
																	@role('admin')
                                                                      {!! Form::select('role_id',$roles, null, ['class'=> 'form-control selectpicker','data-live-search'=>'Ingresa Rol de usuario']) !!}
																	@endrole
																	@role('editor')
                                                                      {!! Form::select('role_id',$roleseditor, null, ['class'=> 'form-control selectpicker','data-live-search'=>'Ingresa Rol de usuario']) !!}
																	@endrole

                                                                  </div>
                                                                  </div>

										                        <div>
										                            {!! Form::submit('Guardar',['class' => 'btn btn-primary']) !!}
										                        </div>
										                    {!! Form::close() !!}
													</div>
												</div>
												
              								 </div>

              								  <div role="tabpanel" class="tab-pane" id="seguridad">
              								 </div>
  								    </div>
				          </div>
		          </div>
          </div>
@stop