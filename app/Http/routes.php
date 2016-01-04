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

Route::resource('/autorizar', 'Api\AutorizarController', ['only' => ['index']]);
Route::post('/registro', [
    'as' => 'auth.register',
    'uses' => 'Api\AutorizarController@register'
  ]);
  Route::post('/login', [
      'as' => 'auth.login',
    'uses' =>  'Api\AutorizarController@login'
  ]);

    Route::resource('authenticate', 'AuthenticateController', ['only' => ['index']]);
    Route::post('authenticate', 'AuthenticateController@authenticate');
    Route::post('registro', 'AuthenticateController@register');
    Route::get('authenticate/user', 'AuthenticateController@getAuthenticatedUser');
});

//}); 
Route::group(['middleware' => ['auth','role:admin|editor']], function()
{

  //Mail Ejemplo
  /* Route::get('/email', function () {

          Mail::send('emails.test',['name'=>'Carlos'], function($message){
          
              $message->to('carlos.ruano@crweb.net')->subject('Hola Don Campeon!');
          });


        });
        */

         //Escritorio
      Route::get('/escritorio', function () {

          return view('admin/escritorio');


      	});

        //campeones
      Route::get('/campeones', function () {
          return view('admin/campeones/campeones');
        });

      Route::post('campeones/store',['as' => 'campeones.store', 'uses' => 'UserCampeonesController@store']);

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
     
        });

      //Equipos
      Route::resource('equipos','EquiposController');
      Route::post('equipos/storeligas',['as' => 'storeligas', 'uses' => 'EquiposController@storeligas']);
      Route::delete('equipos/destroyliga/{id}',['as' => 'destroyliga', 'uses' => 'EquiposController@destroyliga']);
      Route::resource('ligas','LigasController');
      Route::resource('pais','PaisController');


      //Juego
       Route::get('juego',['as' => 'juego', 'uses' => 'JuegoParametrosController@index']);
       Route::put('juego/updatepuntosiniciales/{id}',['as' => 'updatepuntosiniciales', 'uses' => 'JuegoParametrosController@updatepuntosiniciales']);
       Route::put('juego/updateminimoretos/{id}',['as' => 'updateminimoretos', 'uses' => 'JuegoParametrosController@updateminimoretos']);
       Route::put('juego/updatepuntosrecompensa/{id}',['as' => 'updatepuntosrecompensa', 'uses' => 'JuegoParametrosController@updatepuntosrecompensa']);
       Route::put('juego/updaterecompensanojuegos/{id}',['as' => 'updaterecompensanojuegos', 'uses' => 'JuegoParametrosController@updaterecompensanojuegos']);
        Route::put('juego/updaterecompensapjuegos/{id}',['as' => 'updaterecompensapjuegos', 'uses' => 'JuegoParametrosController@updaterecompensapjuegos']);
   
   


});
