//************************************Pasarelas**********************************************//
dApp.controller('EquiposCtrl',function($scope, $http, $timeout, $log,$uibModal,$location,$window,moment){

   $scope.status = {
    isopen: false
  };

  $scope.toggleDropdown = function($event) {
    $event.preventDefault();
    $event.stopPropagation();
    $scope.status.isopen = !$scope.status.isopen;
  };

  $scope.appendToEl = angular.element(document.querySelector('#dropdown-long-content'));

   $scope.nuevo_obj = false;
   $scope.editar_obj = false;
   $scope.mas_obj= false;
   $scope.abmas_obj= false;
   $scope.opcion_obj= false;
   $scope.ver_eli = false;


   $scope.btn_nuevo = function() {
        $scope.nuevo_obj = !$scope.nuevo_obj;
       $scope.sucursal={};
   };

  //Quitar filtro   
  $scope.deselec=function(){
    $scope.busfiltro='';
  }



		 //Todos los equipos
      $http.get('/js/equipos').success(

              function(equipos) {
                        $scope.equipos = equipos.datos.slice(0, 15);
                          $scope.masequipos = function () {
                                  $scope.equipos = equipos.datos.slice(0, $scope.equipos.length + 15);
                              }
            }).error(function(error) {
                 $scope.error = error;
            });

       //Todos las ligas
       
 
      $http.get('/js/ligas').success(

              function(ligasen) {
                        $scope.ligasen = ligasen.datos;
            }).error(function(error) {
                 $scope.error = error;
            });       

     

     $scope.ligas = [];
	   $scope.ligasig = function(equipo)
	    {   
	     		 //Ligas asignadas
		      $http.get('/js/ligasasig/'+equipo.id).success(

		              function(ligas) {
		                        equipo.ligas = ligas.datos;

		            }).error(function(error) {
		                 equipo.error = error;
		            });
	    }; 
      
      $scope.mili=[];
      $scope.agregarliga=function(liga,equipo){
              var dataliga={
                ligas_id:liga,
                equipos_id:equipo
              }
              console.log(dataliga);
                $http.post('/js/equipos/storeligas', dataliga)
                                .success(function (data, status, headers) {
                                         //Todos los equipos
                                              $http.get('/js/equipos').success(

                                                      function(equipos) {
                                                                 $scope.equipos = equipos.datos.slice(0, 15);
                                                                  $scope.masequipos = function () {
                                                                          $scope.equipos = equipos.datos.slice(0, $scope.equipos.length + 15);
                                                                      }
                                                    }).error(function(error) {
                                                         $scope.error = error;
                                                    });

                                               console.log("Liga agregada al ganador");
                                   })
                                .error(function (data, status, header, config) {
                                    console.log("Parece que la liga ya existe");
                                 //   $timeout(function () { $scope.alertaExiste = true; }, 100);
                                 //   $timeout(function () { $scope.alertaExiste = false; }, 5000);
                                });

              

      };


	        //Abrir X ganador
	         $scope.exisGanador={};
	         	$scope.abrirganador= function(ganador){
		          $scope.mas_obj = !$scope.mas_obj;

		           $scope.exisGanador=ganador;
		           $scope.miid=ganador.id;
		           console.log($scope.exisGanador);
		           $scope.btn_cerrarc=function(){
		            	$scope.mas_obj = false;
		           };

               //Btn Agregar Liga
               $scope.acti_nuevaliga=false;
               $scope.agregarliga=function(){
                 $scope.acti_nuevaliga = !$scope.acti_nuevaliga;
                 $scope.acti_multi=false;
                 //Ligas asignadas
                      $http.get('/js/ligasasig/'+$scope.miid).success(

                              function(ligasa) {
                                        $scope.ligasa = ligasa.datos;
                                        //console.log($scope.ligasa);
                            }).error(function(error) {
                                 $scope.error = error;
                            }); 


               };

                $http.get('/js/ligaganador/'+$scope.miid).success(

                    function(ligaganador) {
                              $scope.ligaganador = ligaganador.datos;
                  }).error(function(error) {
                       $scope.error = error;
                  });    

               //Guardar Ganador
               $scope.ganador={};
               $scope.guardarGanador=function(){
                       var dataganador = {
                            id_liga: $scope.ganador.liga_id,
                            id_equipo: $scope.miid
                          };

                            $http.post('/js/ligaganador/create', dataganador)
                                .success(function (data, status, headers) {

                                         $http.get('/js/ligaganador/'+$scope.miid).success(

                                                function(ligaganador) {
                                                          $scope.ligaganador = ligaganador.datos;
                                              }).error(function(error) {
                                                   $scope.error = error;
                                              });    
                                               console.log("Liga agregada al ganador");
                                   })
                                .error(function (data, status, header, config) {
                                    console.log("Parece que la liga ya existe");
                                 //   $timeout(function () { $scope.alertaExiste = true; }, 100);
                                 //   $timeout(function () { $scope.alertaExiste = false; }, 5000);
                                });
                                   $scope.acti_nuevaliga = !$scope.acti_nuevaliga;

                    
               };


              
              


               //Agregar multiplicador
               $scope.acti_multi=false;
               $scope.agregarmulti=function(liga,idganador){
                 $scope.acti_multi = true;
                 $scope.acti_nuevaliga=false;
                 $scope.idliga=liga;
                 $scope.idganador=idganador;
                 console.log('Liga:', liga, '| Id Ganador: ', idganador);
                 //Ligas asignadas
                      $http.get('/js/ligasasig/'+$scope.miid).success(

                              function(ligasa) {
                                        $scope.ligasa = ligasa.datos;
                                        //console.log($scope.ligasa);
                            }).error(function(error) {
                                 $scope.error = error;
                            }); 
                 //Ligas asignadas
                      $http.get('/js/ligasequipos/'+$scope.idliga).success(

                              function(visitas) {
                                        $scope.visitas = visitas.datos;
                                        //console.log($scope.ligasa);
                            }).error(function(error) {
                                 $scope.error = error;
                            }); 

                 //Listado de Multiplicadores 
                   $http.get('/js/multiganador/'+$scope.idganador).success(

                              function(multiganador) {
                                        $scope.multiganador = multiganador.datos;
                                        //console.log($scope.ligasa);
                            }).error(function(error) {
                                 $scope.error = error;
                            });                  

                 //Guardar multiplicador
                 $scope.multi={};
                 $scope.guardarMulti=function(){
                  
                    
                      var datamulti = {
                            visita_equipo: $scope.multi.visita_equipo,
                            id_porganador: $scope.idganador,
                            resultado_casa:$scope.multi.rec,
                            resultado_empate:$scope.multi.rex,
                            resultado_visita:$scope.multi.rev,
                            probabilidad_casa:$scope.multi.prc,
                            probabilidad_empate:$scope.multi.prx,
                            probabilidad_visita:$scope.multi.prv,
                            multi_casa:$scope.multi.muc,
                            multi_empate:$scope.multi.mux,
                            multi_visita:$scope.multi.muv
                          };

                           $http.post('/js/multiganador/create', datamulti)
                                .success(function (data, status, headers) {

                                          //Listado de Multiplicadores 
                                             $http.get('/js/multiganador/'+$scope.idganador).success(

                                                        function(multiganador) {
                                                                  $scope.multiganador = multiganador.datos;
                                                                  //console.log($scope.ligasa);
                                                      }).error(function(error) {
                                                           $scope.error = error;
                                                      }); 
                                                       $scope.multi={};    
                                   })
                                .error(function (data, status, header, config) {
                                    console.log("Parece que la liga ya existe");
                                 //   $timeout(function () { $scope.alertaExiste = true; }, 100);
                                 //   $timeout(function () { $scope.alertaExiste = false; }, 5000);
                                });
                 };           


           };

                       

  		 };      

});