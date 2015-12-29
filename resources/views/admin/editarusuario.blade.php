@extends('admin/layout')

@section('content')
      <div class="col-sm-12">
          <h1 class="page-header">Editar Usuario</h1>
             <div class="col-sm-12 col-md-9 col-lg-6  spi">
               <div class="caja_section">
                <div class="col-sm-12">
                      @include('admin.sections.errors')
                        <?php
                           $roles=\Doncampeon\Models\Roles::whereNotIn('id',[4])->orderBy('id','ASC')->lists('name','id');
                           $roleseditor=\Doncampeon\Models\Roles::whereNotIn('id',[1,4])->orderBy('id','ASC')->lists('name','id');
                            $elpais=\Doncampeon\Models\Pais::orderBy('id','ASC')->lists('nombre','id');
                          ?>
                            {!! Form::model($user,['route'=>['usuarios.update',$user->id],'method'=>'PUT']) !!}
                             <div class="col-lg-6 col-md-6 ">
                                    <div class="form-group">
                                        <label>Usuario</label>
                                        {!! Form::label('username', $user->username, ['class'=> 'form-control','placeholder'=>'Ingresa nombre del equipo']) !!}
                                    </div>
                             </div>
                             <div class="col-lg-6 col-md-6 ">
                                    <div class="form-group">
                                        <label>Correo</label>
                                        {!! Form::label('email', $user->email, ['class'=> 'form-control','placeholder'=>'Ingresa nombre del equipo']) !!}
                                    </div>
                             </div>
                             <div class="col-lg-6 col-md-6 ">
                                     <div class="form-group">
                                        <label>Nombre</label>
                                        {!! Form::text('first_name',$userprofile->first_name, ['class'=> 'form-control','placeholder'=>'Ingresa nombre']) !!}
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 ">
                                        <div class="form-group">
                                            <label>Apellido</label>
                                            {!! Form::text('last_name',$userprofile->last_name, ['class'=> 'form-control','placeholder'=>'Ingresa apellido']) !!}
                                        </div>
                                </div>
                                 <div class="col-lg-2 col-md-2 ">
                                        <div class="form-group">
                                            <label>Edad</label>
                                            {!! Form::number('edad',$userprofile->edad, ['class'=> 'form-control','placeholder'=>'Ingresa edad']) !!}
                                        </div>
                                 </div>
                                 <div class="col-lg-5 col-md-5 ">
                                        <div class="form-group">
                                            <label>Pais</label>
                                             {!! Form::select('pais',$elpais, $userprofile->pais, ['class'=> 'form-control selectpicker','data-live-search'=>'Ingresa nombre del pais']) !!}
                                        </div>
                                </div>
                                <div class="col-lg-5 col-md-5 ">
                                        <div class="form-group">
                                            <label>Dirección</label>
                                            {!! Form::text('direccion',$userprofile->direccion, ['class'=> 'form-control','placeholder'=>'Ingresa dirección']) !!}
                                        </div>
                                </div>

                                <div class="col-lg-6 col-md-6 ">
                                     <div class="form-group">
                                        <label>Facebook</label>
                                        {!! Form::text('facebook',$userprofile->facebook, ['class'=> 'form-control','placeholder'=>'Ingresa Usuario /usuario']) !!}
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 ">
                                        <div class="form-group">
                                            <label>Twitter</label>
                                            {!! Form::text('twitter',$userprofile->twitter, ['class'=> 'form-control','placeholder'=>'Ingresa alias']) !!}
                                        </div>
                                </div>

                                <div class="col-sm-12  col-md-4">
                                <div class="form-group">
                                            <label>Rol Asignado:</label>
                                  @role('admin')
                                                                      {!! Form::select('role_id',$roles,$roleuser->role_id, ['class'=> 'form-control selectpicker','data-live-search'=>'Ingresa Rol de usuario']) !!}
                                  @endrole
                                  @role('editor')
                                                                      {!! Form::select('role_id',$roleseditor,$roleuser->role_id, ['class'=> 'form-control selectpicker','data-live-search'=>'Ingresa Rol de usuario']) !!}
                                  @endrole
                                  </div>
                                </div>


                                <div class="col-sm-12  col-md-4">
                                                <div class="form-group">
                                                    <label>Password</label>
                                                    {!! Form::password('password', ['class'=> 'form-control','placeholder'=>'Ingresa password']) !!}
                                                </div>
                                            </div>
                                 <div class="col-sm-12  col-md-4">
                                                <div class="form-group">
                                                    <label>Confirmar Password</label>
                                                    {!! Form::password('password_confirmation', ['class'=> 'form-control','placeholder'=>'Repite el password']) !!}
                                                </div>
                                            </div>
                                
                                <div>
                                    {!! Form::submit('Editar',['class' => 'btn btn-primary']) !!}
                                </div>
                            {!! Form::close() !!}
                   </div>
              
               </div>
             </div>
         </div>
@stop