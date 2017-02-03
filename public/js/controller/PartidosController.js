//************************************Partidos**********************************************//
dApp.controller('PartidosCtrl',function($scope, $http, $timeout, $log,$uibModal,$location,$window,moment){

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

  		 //Todos los partidos
      $http.get('/js/partidos/calendario').success(

              function(partidos) {
                        $scope.partidos = partidos.datos.slice(0, 15);
                          $scope.maspartidos = function () {
                                  $scope.partidos = partidos.datos.slice(0, $scope.partidos.length + 15);
                              }
            }).error(function(error) {
                 $scope.error = error;
            });



});	