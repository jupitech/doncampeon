<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/*use Mail;*/
// Authentication routes...
Route::get('/',  [ 'uses' => 'Auth\AuthController@getLogin','as' =>'login']);
Route::post('/', 'Auth\AuthController@postLogin');
Route::get('auth/logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);


Route::group(['middleware' => 'cors','prefix' => 'api/v1'], function()
{

  
    //Autenticacion de Usuario
    Route::resource('authenticate', 'AuthenticateController', ['only' => ['index']]);
    Route::post('authenticate', 'AuthenticateController@authenticate');
    Route::post('registro', 'AuthenticateController@register');
    Route::get('authenticate/user', 'AuthenticateController@getAuthenticatedUser');
     //Perfil del Usuario
     Route::get('perfilusuario/{id}', 'Api\ApiPerfilUserController@perfilusuario');
     Route::get('perfilgame/{id}', 'Api\ApiPerfilUserController@perfilgame');
     Route::get('gamenivel/{id}', 'Api\ApiPerfilUserController@gamenivel');

     //Traendo partidos al api
     Route::get('partidossemana', 'Api\ApiPartidoCalendarioController@indexsemana');
     Route::get('partidoshoy', 'Api\ApiPartidoCalendarioController@indexhoy');
     Route::get('partidosmes', 'Api\ApiPartidoCalendarioController@indexmes');
     Route::get('partidosmessi', 'Api\ApiPartidoCalendarioController@indexmessi');

     Route::get('partidosconsemana', 'Api\ApiPartidoCalendarioController@contsemana');
     Route::get('partidosconhoy', 'Api\ApiPartidoCalendarioController@conthoy');
     Route::get('partidosconmes', 'Api\ApiPartidoCalendarioController@contmes');
     Route::get('partidosconmessi', 'Api\ApiPartidoCalendarioController@contmessi');

     Route::get('partido/{id}', 'Api\ApiPartidoCalendarioController@indexpartido');
     
     Route::get('partidosmes', 'Api\ApiPartidoCalendarioController@indexmes');
      //Traendo Ligas al api
     Route::get('listadoligas', 'Api\ApiLigascontroller@indexlistado');
      Route::get('partidoliga/{idliga}', 'Api\ApiPartidoCalendarioController@partidoliga');

      //Agregando partidos como favorito
       Route::post('partidofav/act', 'Api\ApiPartidoFavoritoController@store');
       Route::get('partidofav/ver/{user_id}/{partido_id}', 'Api\ApiPartidoFavoritoController@show');
       Route::put('partidofav/nact/{user_id}/{partido_id}', 'Api\ApiPartidoFavoritoController@update');

        //Agregando retos puntos por usuario
        Route::post('partidoreto/puntos', 'Api\ApiRetoPuntosController@store');
});

//}); 
Route::group(['middleware' => ['auth','role:admin|editor']], function()
{

     //Escritorio
      Route::get('/escritorio', function () {

          return view('admin/escritorio');


      	});


         //partidos
     
         Route::get('partidos',['as' => 'partidos', 'uses' => 'PartidoCalendarioController@index']);
         Route::get('partidos/hoy',['as' => 'partidos.hoy', 'uses' => 'PartidoCalendarioController@indexhoy']);
         Route::get('partidos/semana',['as' => 'partidos.semana', 'uses' => 'PartidoCalendarioController@indexsemana']);
         Route::get('partidos/2semanas',['as' => 'partidos.2semanas', 'uses' => 'PartidoCalendarioController@index2semanas']);
         Route::get('partidos/mes',['as' => 'partidos.mes', 'uses' => 'PartidoCalendarioController@indexmes']);
         Route::get('partidos/anteriores',['as' => 'partidos.anteriores', 'uses' => 'PartidoCalendarioController@indexanteriores']);

         Route::get('partidos/create',['as' => 'partidos.create', 'uses' => 'PartidoCalendarioController@create']);
         Route::post('partidos/store',['as' => 'partidos.store', 'uses' => 'PartidoCalendarioController@store']);  
         Route::delete('partidos/destroy/{id}',['as' => 'partidos.destroy', 'uses' => 'PartidoCalendarioController@destroy']);
         Route::get('partidos/show/{id}',['as' => 'partidos.ver', 'uses' => 'PartidoCalendarioController@show']);
         Route::get('partidos/edit/{id}',['as' => 'partidos.edit', 'uses' => 'PartidoCalendarioController@edit']);
         Route::put('partidos/update/{id}',['as' => 'partidos.update', 'uses' => 'PartidoCalendarioController@update']);
         //Resultados Panel
         Route::get('resultados',['as' => 'resultados', 'uses' => 'ResultadosPanelController@index']);
         //Resultados
         Route::post('partidos/resultadostore',['as' => 'partido.amarcador', 'uses' => 'PartidoResultadoController@store']);  

         //Probabilidades
         Route::get('probabilidades',['as' => 'probabilidades', 'uses' => 'ProbabilidadesLigasController@index']);
         Route::get('probabilidades/create',['as' => 'probabilidades.create', 'uses' => 'ProbabilidadesLigasController@create']);
         Route::post('probabilidades/store',['as' => 'probabilidades.store', 'uses' => 'ProbabilidadesLigasController@store']);  
         Route::delete('probabilidades/destroy/{id}',['as' => 'probabilidades.destroy', 'uses' => 'ProbabilidadesLigasController@destroy']);

        //campeones
          Route::get('/campeones', function () {
              return view('admin/campeones/campeones');
            });

          Route::post('campeones/store',['as' => 'campeones.store', 'uses' => 'UserCampeonesController@store']);
          Route::get('campeones/edit/{id}',['as' => 'campeones.edit', 'uses' => 'UserCampeonesController@edit']);
          Route::put('campeones/update/{id}',['as' => 'campeones.update', 'uses' => 'UserCampeonesController@update']);
      
          //Opciones
          Route::get('/opciones', function () {
              return view('admin/opciones');
            });

          // Registration routes...
          Route::get('/register', 'Auth\AuthController@getRegister');
          Route::post('/register', ['as' => 'register', 'uses' => 'Auth\AuthController@postRegister']);


           //Usuarios Sistema
          Route::post('usuarios/store',['as' => 'usuarios.store', 'uses' => 'UserController@store']);
          Route::get('usuarios/edit/{id}',['as' => 'usuarios.edit', 'uses' => 'UserController@edit']);
          Route::put('usuarios/update/{id}',['as' => 'usuarios.update', 'uses' => 'UserController@update']);



      Route::group(['middleware' => ['auth','role:admin']], function()
        {
              Route::delete('usuarios/destroy/{id}',['as' => 'usuarios.destroy', 'uses' => 'UserController@destroy']);
              Route::put('usuarios/restaurar/{id}',['as' => 'usuarios.restaurar', 'uses' => 'UserController@restaurar']);
              Route::delete('campeones/destroy/{id}',['as' => 'campeones.destroy', 'uses' => 'UserCampeonesController@destroy']);
              Route::put('campeones/restaurar/{id}',['as' => 'campeones.restaurar', 'uses' => 'UserCampeonesController@restaurar']);
     
        });

      //Equipos
      Route::resource('equipos','EquiposController');
      Route::post('equipos/storeligas',['as' => 'storeligas', 'uses' => 'EquiposController@storeligas']);
      Route::delete('equipos/destroyliga/{id}',['as' => 'destroyliga', 'uses' => 'EquiposController@destroyliga']);
      Route::resource('ligas','LigasController');
      Route::resource('pais','PaisController');


      //Juego
      Route::get('juego',['as' => 'juego', 'uses' => 'JuegoParametrosController@index']);
      Route::get('nivelgame',['as' => 'nivelgame', 'uses' => 'GameNivelController@index']);
      Route::put('juego/updatepuntosiniciales/{id}',['as' => 'updatepuntosiniciales', 'uses' => 'JuegoParametrosController@updatepuntosiniciales']);
      Route::put('juego/updateminimoretos/{id}',['as' => 'updateminimoretos', 'uses' => 'JuegoParametrosController@updateminimoretos']);
      Route::put('juego/updatepuntosrecompensa/{id}',['as' => 'updatepuntosrecompensa', 'uses' => 'JuegoParametrosController@updatepuntosrecompensa']);
      Route::put('juego/updaterecompensanojuegos/{id}',['as' => 'updaterecompensanojuegos', 'uses' => 'JuegoParametrosController@updaterecompensanojuegos']);
      Route::put('juego/updaterecompensapjuegos/{id}',['as' => 'updaterecompensapjuegos', 'uses' => 'JuegoParametrosController@updaterecompensapjuegos']);

      //Niveles
      Route::post('juego/store',['as' => 'juego.store', 'uses' => 'GameNivelController@store']);
      Route::get('juego/create',['as' => 'juego.create', 'uses' => 'GameNivelController@create']);
      Route::put('nivelgame/update/{id}',['as' => 'nivelgame.update', 'uses' => 'GameNivelController@update']);

      //Tukis Paquetes
       Route::get('tukis/paquetes',['as' => 'tukispaquetes', 'uses' => 'PaqueteTukisController@index']);
       Route::get('tukis/paquetes/create',['as' => 'paquetes.create', 'uses' => 'PaqueteTukisController@create']);
       Route::post('tukis/paquetes/store',['as' => 'paquetes.store', 'uses' => 'PaqueteTukisController@store']);
       Route::get('tukis/paquetes/edit/{id}',['as' => 'paquetes.edit', 'uses' => 'PaqueteTukisController@edit']);
       Route::put('tukis/paquetes/update/{id}',['as' => 'paquetes.update', 'uses' => 'PaqueteTukisController@update']);
       Route::delete('tukis/paquetes/destroy/{id}',['as' => 'paquetes.destroy', 'uses' => 'PaqueteTukisController@destroy']);

});
