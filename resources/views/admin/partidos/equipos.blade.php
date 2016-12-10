@extends('admin/layout')

@section('content')
     @include('admin.sections.menuequipos')
      <div class="col-sm-12" ng-controller="EquiposCtrl">
      <div class="page-header">
            <div class="col-sm-6 spi spd">
                  Equipos
             </div>
            <div class="col-sm-6 spi spd">
               <div class="lbotones">
                  <a href="{{ URL::to('equipos/create') }}" type="button" class="btn btn-donc-nuevo" aria-label="Left Align" ><span class="glyphicon glyphicon-file" aria-hidden="true"></span>  Nuevo Equipo</a>

               </div>
               </div>

      </div>
      {{-- Area por ganador de equipos --}}
      <div id="area_mas" ng-if="mas_obj">
           <div class="header_nuevo">

                        <div class="col-sm-12">
                              <h1><span>Ganador</span>Equipo @{{exisGanador.nombre_equipo}}</h1>
                              <a class="btn_cerrar" ng-click="btn_cerrarc()"></a>
                        </div>
            </div>
             <div class="conte_nuevo">
                  <div class="tab_porliga col-sm-12">
                    <ul>
                      <li ng-repeat="ligag in ligaganador"><a ng-click="agregarmulti(ligag.nombreliga.id,ligag.id)">@{{ ligag.nombreliga.nombre_liga}}</a></li>
                    </ul>
                     <span class="ico_op">
                                <a class="btn btn-donc-editar" ng-click="agregarliga()">Agregar Liga</a>
                          </span>
                  </div>
                  <div class="nueva_ligapro" ng-if="acti_nuevaliga">
                        <form class="form-horizontal" name="frm" role="form" ng-submit="guardarGanador()" >
                              <div class="col-sm-10 col-md-10 col-lg-11">
                                          <div class="col-sm-8 spi">
                                                        <ol class="nya-bs-select" ng-model="ganador.liga_id" data-live-search="true"  title="Agregar Liga..." required  data-size="10">
                                                          <li nya-bs-option="liga in ligasa" data-value="liga.ligas_id">
                                                            <a>
                                                             <span>
                                                                  @{{ liga.nombreliga.nombre_liga}}
                                                                </span>
                                                              <span class="glyphicon glyphicon-ok check-mark"></span>
                                                            </a>
                                                          </li>
                                                        </ol>
                                                    </div>
                                         <div class="col-sm-3 spi ">
                                                    <button type="submit" class="btn btn-primary btn_add" ng-disabled="frm.$invalid">
                                                      <span class="glyphicon glyphicon-plus"></span>
                                                    </button>
                                                </div>           
                                                       
                              </div>
                        </form>
                  </div>
         

                  {{-- Agregando multiplicador --}}
                   <div class="nuevo_multi" ng-if="acti_multi">
                        <form class="form-horizontal" name="frm" role="form" ng-submit="guardarMulti()" >
                              <div class="col-sm-12 col-md-12 col-lg-12">
                                          <div class="col-sm-12 spd spi">
                                          <label for="">Equipo Visita</label>
                                                        <ol class="nya-bs-select" ng-model="multi.visita_equipo
                                                        " data-live-search="true"  title="Agregar Equipo..." required  data-size="10">
                                                          <li nya-bs-option="visita in visitas" data-value="visita.equipos_id">
                                                            <a>
                                                             <span>
                                                                  @{{ visita.nombre_equipo.nombre_equipo}}
                                                                </span>
                                                              <span class="glyphicon glyphicon-ok check-mark"></span>
                                                            </a>
                                                          </li>
                                                        </ol>
                                                    </div>
                                           <div class="col-sm-11 spi">
                                                       <div class="col-sm-4 spd spi">

                                                             <div class="col-sm-12 spd spi">
                                                                  <label for="" class="label_multi">Resultado</label>
                                                             </div>
                                                               <div class="col-sm-4">
                                                                <label for="rec" class="label_multif cla_azul">Casa</label>
                                                                  <input id="rec" type="text" class="form-control" name="rec" ng-model="multi.rec" required>
                                                              </div>
                                                              <div class="col-sm-4">
                                                                <label for="" class="label_multif cla_azul">X</label>
                                                                 <input id="rex" type="text" class="form-control" name="rec" ng-model="multi.rex" required>
                                                              </div>
                                                              <div class="col-sm-4">
                                                                <label for="" class="label_multif cla_azul">Visita</label>
                                                                 <input id="rev" type="text" class="form-control" name="rev" ng-model="multi.rev" required>
                                                              </div>
                                                       </div>

                                                       <div class="col-sm-4 spd spi">
                                                       
                                                             <div class="col-sm-12 spd spi">
                                                                  <label for="" class="label_multi">Probabilidad</label>
                                                             </div>
                                                               <div class="col-sm-4">
                                                                <label for="prc" class="label_multif cla_ama">Casa</label>
                                                                  <input id="prc" type="text" class="form-control" name="prc" ng-model="multi.prc" required>
                                                              </div>
                                                              <div class="col-sm-4">
                                                                <label for="prx" class="label_multif cla_ama">X</label>
                                                                 <input id="prx" type="text" class="form-control" name="prx" ng-model="multi.prx" required>
                                                              </div>
                                                              <div class="col-sm-4">
                                                                <label for="prv" class="label_multif cla_ama">Visita</label>
                                                                 <input id="prv" type="text" class="form-control" name="prv" ng-model="multi.prv" required>
                                                              </div>
                                                       </div>


                                                       <div class="col-sm-4 spd spi">
                                                       
                                                             <div class="col-sm-12 spd spi">
                                                                  <label for="" class="label_multi">Multiplicador</label>
                                                             </div>
                                                               <div class="col-sm-4">
                                                                <label for="muc" class="label_multif cla_ver">Casa</label>
                                                                  <input id="muc" type="text" class="form-control" name="muc" ng-model="multi.muc" required>
                                                              </div>
                                                              <div class="col-sm-4">
                                                                <label for="mux" class="label_multif cla_ver">X</label>
                                                                 <input id="mux" type="text" class="form-control" name="mux" ng-model="multi.mux" required>
                                                              </div>
                                                              <div class="col-sm-4">
                                                                <label for="muv" class="label_multif cla_ver">Visita</label>
                                                                 <input id="muv" type="text" class="form-control" name="muv" ng-model="multi.muv" required>
                                                              </div>
                                                       </div>
                                                       
                                            </div>          
                                             <div class="col-sm-1 spi spd">
                                                        <button type="submit" class="btn btn-primary btn_add topbtn" ng-disabled="frm.$invalid">
                                                          <span class="glyphicon glyphicon-plus"></span>
                                                        </button>
                                                    </div>           
                                                       
                              </div>
                        </form>
                  </div>
                  {{-- Listado de Multiplicador por liga asignada --}}
                 <div class="lis_multi" ng-if="acti_multi">
                              <table class="table">
                                <thead>
                                  <tr>
                                    <th rowspan="2">Visita</th>
                                    <th colspan="3">Resultado</th>
                                    <th colspan="3">Probabilidad</th>
                                    <th colspan="3">Multiplicador</th>
                                  </tr>
                                  <tr>
                                    <th>C</th>
                                    <th>X</th>
                                    <th>E</th>
                                    <th>C</th>
                                    <th>X</th>
                                    <th>E</th>
                                    <th>C</th>
                                    <th>X</th>
                                    <th>E</th>
                                  </tr>

                                </thead>
                                <tbody>
                                  <tr ng-repeat="multiga in multiganador">
                                    <td>@{{multiga.equipo_visita.nombre_equipo}}</td>
                                    <td>@{{multiga.resultado_casa}}</td>
                                    <td>@{{multiga.resultado_empate}}</td>
                                    <td>@{{multiga.resultado_visita}}</td>
                                    <td>@{{multiga.probabilidad_casa | number:2}}%</td>
                                    <td>@{{multiga.probabilidad_empate | number:2}}%</td>
                                    <td>@{{multiga.probabilidad_visita | number:2}}%</td>
                                    <td>@{{multiga.multi_casa | number:2}}</td>
                                    <td>@{{multiga.multi_empate | number:2}}</td>
                                    <td>@{{multiga.multi_visita | number:2}}</td>
                                  </tr>
                                </tbody>
                              </table>
                  </div>
             </div>

      </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-sx-12 spi spd">

         	 <div class="caja_section">

           {{-- Listado de equipos --}}
              <table class="table">
                  <thead>
                    <tr>
                      <th>Camisola</th>
                      <th>Equipo</th>
                      <th>Alias</th>
                      <th>Pais</th>
                      <th>Ligas Asignadas</th>
                      <th>Probabilidades</th>
                      <th>Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr ng-repeat="equipo in equipos">
                          <td class="area_camisola"><p class="img-camisola" style="background: #eee url('../assets/img/@{{equipo.alias}}.svg') no-repeat center bottom !important; background-size: 40px;"></p></td>
                          <td>@{{equipo.nombre_equipo}}</td>
                          <td>@{{equipo.alias}}</td>
                          <td>@{{equipo.nombre_pais.nombre}}</td>
                          <td> 
                          <span class="spanli" ng-repeat="liga in equipo.ligas_equipo">@{{liga.nombreliga.nombre_liga}} </span>
                          <span class="ico_opli">
                                    <a class="btn btn-donc-add glyphicon glyphicon-plus"></a>
                              </span>
                          </td>
                          <td>
                              <span class="ico_op">
                                    <a class="btn btn-donc-editar" ng-click="abrirganador(equipo)">X Ganador</a>
                              </span>
                          </td>
                          <td>
                            
                                 <span class="ico_op">
                                    <a class="btn btn-donc-editar glyphicon glyphicon-pencil"></a>
                              </span>
                                 <span class="ico_op">
                                     <a class="btn btn-donc-eliminar glyphicon drop_delete glyphicon-remove"></a>
                              </span>
                          </td>
                    </tr>
                  </tbody>
              </table>

           

          </div>

         	 </div>
        </div>
        </div>


@endsection

@push('scripts')
    <script src="/js/script.js"></script>
    <script src="/js/controller/EquiposController.js"></script>
@endpush
