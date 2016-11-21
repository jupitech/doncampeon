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
                      <li ng-repeat="ligag in ligaganador"><a href="">@{{ ligag.nombreliga.nombre_liga}}</a></li>
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
                                         <div class="col-sm-3 spi">
                                                    <button type="submit" class="btn btn-primary btn_add" ng-disabled="frm.$invalid">
                                                      <span class="glyphicon glyphicon-plus"></span>
                                                    </button>
                                                </div>           
                                                       
                              </div>
                        </form>
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
                    <tr ng-repeat="equipo in equipos" ng-init="ligasig(equipo)">
                      <td class="area_camisola"><p class="img-camisola" style="background: #eee url('../assets/img/@{{equipo.alias}}.svg') no-repeat center bottom !important; background-size: 40px;"></p></td>
                      <td>@{{equipo.nombre_equipo}}</td>
                      <td>@{{equipo.alias}}</td>
                      <td>@{{equipo.nombre_pais.nombre}}</td>
                      <td> 
                      <span class="spanli" ng-repeat="liga in equipo.ligas">@{{liga.nombreliga.nombre_liga}} </span>
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
