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


// Authentication routes...
Route::get('/',  [ 'uses' => 'Auth\AuthController@getLogin','as' =>'login']);
Route::post('/', 'Auth\AuthController@postLogin');
Route::get('auth/logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);


Route::group(['middleware' => 'cors'], function(){
    Route::get("equiposp","EquiposController@indexp");
});

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
    Route::get('authenticate/user', 'AuthenticateController@getAuthenticatedUser');
});

//}); 
Route::group(['middleware' => ['auth','role:admin']], function()
{
  Route:: get("equipostodos","EquiposController@indexp");
   //Escritorio
	Route::get('/escritorio', function () {

    return view('admin/escritorio');


	});

    // Registration routes...
Route::get('/register', 'Auth\AuthController@getRegister');
Route::post('/register', ['as' => '/register', 'uses' => 'Auth\AuthController@postRegister']);

//Equipos
Route::resource('equipos','EquiposController');
Route::post('equipos/storeligas',['as' => 'storeligas', 'uses' => 'EquiposController@storeligas']);
Route::delete('equipos/destroyliga/{id}',['as' => 'destroyliga', 'uses' => 'EquiposController@destroyliga']);
Route::resource('ligas','LigasController');
Route::resource('pais','PaisController');

});
