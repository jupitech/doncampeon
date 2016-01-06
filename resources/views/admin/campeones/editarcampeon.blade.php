@extends('admin/layout')

@section('content')
      <div class="col-sm-12">
          <h1 class="page-header">Editar Campeón</h1>
             <div class="col-sm-12 col-md-9 col-lg-6  spi">
               <div class="caja_section">
                <div class="col-sm-12">
                      @include('admin.sections.errors')
                        <?php
                            $elpais=\Doncampeon\Models\Pais::orderBy('id','ASC')->lists('nombre','id');
                             $equiposnacionales=\Doncampeon\Models\Equipos::where('pais_equipo','1')->orderBy('id','ASC')->lists('nombre_equipo','id');
                             $equiposinternacionales=\Doncampeon\Models\Equipos::where('pais_equipo','!=','1')->orderBy('id','ASC')->lists('nombre_equipo','id');
                          ?>
                            {!! Form::model($user,['route'=>['campeones.update',$user->id],'method'=>'PUT']) !!}
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
                                 <div class="col-lg-5 col-md-5 ">
                                        <div class="form-group">
                                            <label>Pais</label>
                                             {!! Form::select('pais',$elpais, $userprofile->pais, ['class'=> 'form-control selectpicker','data-live-search'=>'Ingresa nombre del pais']) !!}
                                        </div>
                                </div>
                                <div class="col-lg-7 col-md-7 ">
                                        <div class="form-group">
                                            <label>Dirección</label>
                                            {!! Form::text('direccion',$userprofile->direccion, ['class'=> 'form-control','placeholder'=>'Ingresa dirección']) !!}
                                        </div>
                                </div>

                               <div class="col-lg-6 col-md-6 ">
                                      <div class="form-group">
                                          <label>Equipo Nacional</label>
                                           {!! Form::select('equipo_nacional',$equiposnacionales,$usergame->equipo_nacional, ['class'=> 'form-control selectpicker','data-live-search'=>'Ingresa equipo nacional']) !!}
                                      </div>
                                </div>

                                  <div class="col-lg-6 col-md-6 ">
                                      <div class="form-group">
                                          <label>Equipo Internacional</label>
                                           {!! Form::select('equipo_internacional',$equiposinternacionales,$usergame->equipo_internacional, ['class'=> 'form-control selectpicker','data-live-search'=>'Ingresa equipo nacional']) !!}
                                      </div>
                                </div>

            

                                <div class="col-sm-12  col-md-6">
                                                <div class="form-group">
                                                    <label>Password</label>
                                                    {!! Form::password('password', ['class'=> 'form-control','placeholder'=>'Ingresa password']) !!}
                                                </div>
                                            </div>
                                 <div class="col-sm-12  col-md-6">
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