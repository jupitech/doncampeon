//************************************Pasarelas**********************************************//
dApp.controller('EquiposCtrl',function($scope, $http, $timeout, $log,$uibModal){

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
                        $scope.equipos = equipos.datos;
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

                       

  		 };      

});