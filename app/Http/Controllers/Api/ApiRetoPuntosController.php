<?php

namespace Doncampeon\Http\Controllers\Api;

use Illuminate\Http\Request;

use Doncampeon\Http\Requests;
use Doncampeon\Http\Controllers\Controller;
use JWTAuth;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Exceptions\JWTException;
use Doncampeon\User;
use Illuminate\Support\Facades\Mail;
use Cache;
use Illuminate\Support\Facades\Redis;
use Carbon\Carbon;
use Doncampeon\Models\PartidoCalendario;
use Doncampeon\Models\PartidoRetoPuntos;
use Doncampeon\Models\UserGame;
use Doncampeon\Models\Juego;

class ApiRetoPuntosController extends Controller
{
  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /**
        * Ingresando los puntos del usuario al partido
        */
        $enRedis=Redis::connection();
        $userid=$request['user_id'];
        $cantidadreto=$request['cantidad_reto'];
         //++Buscando la información del usuario de sus puntos en la db
        $game_parametro=Juego::first();
        $usergame=UserGame::where('user_id',$userid)->first();


      if( $cantidadreto <= $usergame->puntos_acumulados){

                $retopuntos=PartidoRetoPuntos::create([
                        'user_id' =>$request['user_id'],
                        'partido_id' =>$request['partido_id'],
                        'marcador_casa' =>$request['marcador_casa'],
                        'marcador_visita' =>$request['marcador_visita'],
                        'cantidad_reto' =>$request['cantidad_reto'],
                    ]);
                $retopuntos->save();
                  
                //++Asignando los puntos actuales acumulados
                $puntos=$usergame->puntos_acumulados;

                //++Restando puntos según la apuesta
                $restar_puntos=$puntos-$request['cantidad_reto'];
                
               if($restar_puntos<= 0){

                    $puntosrecompensa= $game_parametro->puntos_recompensa;
                     //++Agregar puntos recompensa
                        $usergame->fill([
                                'puntos_acumulados' =>  $puntosrecompensa,
                            ]);
                        $usergame->save();

                } else{
                        //++Puntos restados
                        $usergame->fill([
                                'puntos_acumulados' => $restar_puntos,
                            ]);
                        $usergame->save();
                }
                //Contador de retos por puntos
                $elkey='con_tempuntos:'.$userid;
                $existe=$enRedis->exists($elkey);
                $puntosas=$usergame->puntos_acumulados;
                $recompensa=$puntosas+$game_parametro->recompensa_pjuegos;
                if($existe==1){ 
                    //Si llega a no. retos para recompensa
                    $enRedis->incr($elkey);
                    if($enRedis->get($elkey)==$game_parametro->recompensa_nojuegos){
                          //++Puntos restados
                        $usergame->fill([
                                'puntos_acumulados' => $recompensa,
                            ]);
                        $usergame->save();
                        $enRedis->set($elkey,0);  
                    }
                    
                }else{
                    $enRedis->set($elkey,1);    
                }    
                

         } else{
                  return response()->json(['mensaje' =>  'No puedes agregar puntos mayores a los puntos acumulados','codigo'=>404],404);
            }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
