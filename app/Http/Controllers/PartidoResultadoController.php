<?php

namespace Doncampeon\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Redirect;
use Doncampeon\Http\Requests;
use Doncampeon\Http\Controllers\Controller;
use Doncampeon\Models\PartidoCalendario;
use Doncampeon\Models\PartidoResultado;
use Doncampeon\Models\PartidoRetoPuntos;
use Doncampeon\Models\UserGame;
use Doncampeon\Models\ProbabilidadesLigas;
use Carbon\Carbon;
use Cache;
use Illuminate\Support\Facades\Redis;

class PartidoResultadoController extends Controller
{
   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            //Agregando Resultado
      $partidoid=$request['partido_id'];
      $marcadorcasa=$request['marcador_casa'];
      $marcadorvisita=$request['marcador_visita'];

          $resultado= PartidoResultado::create([
                'marcador_casa' => $marcadorcasa,
                'marcador_visita'   => $marcadorvisita,
                'partido_id'   => $partidoid,
            ]);
           $resultado->save();
           //Cambiando a partido terminado
           $partido=PartidoCalendario::where('id',$request['partido_id'])->first();
           $partido->fill([
                'partido_ter' =>1,
            ]);
           $partido->save();

           //Buscando ganadores
           
           $probaliga=ProbabilidadesLigas::where('ligas_id',$partido->liga)->where('marcador_casa',$marcadorcasa)->where('marcador_visita',$marcadorvisita)->first();

           $duplicador=$probaliga->duplicador;

          $ganadores=PartidoRetoPuntos::where('partido_id',$partidoid)->where('marcador_casa',$marcadorcasa)->where('marcador_visita',$marcadorvisita)->get();
          foreach ($ganadores as $ganador) {
            //Contador de listado de ganadores
            $usergame=UserGame::where('user_id',$ganador->user_id)->first();
                //Si encuentra usuarios de juegos
                    if(!is_null($usergame) ){
                         $resuldupli=$ganador->cantidad_reto*$duplicador;
                         $puntosactuales=$usergame->puntos_acumulados;
                         //Marcar al ganador que si gano!         
                         $ganador->resultado_reto = 1;
                         $ganador->save();
                         //Multiplicar las probabilidades y sumarlos a puntos acumulados
                         $usergame->fill([
                                        'puntos_acumulados' =>  $puntosactuales+$resuldupli,
                                    ]);
                         $usergame->save();

                    }
          }
          //Buscando perdedores en marcador casa
          $perdedores_casa=PartidoRetoPuntos::where('partido_id',$partidoid)->where('marcador_casa','!=',$marcadorcasa)->where('marcador_visita',$marcadorvisita)->get();
          foreach ($perdedores_casa as $perdedor_casa) {
            //Contador de listado de ganadores
            $usergame=UserGame::where('user_id',$perdedor_casa->user_id)->first();
                //Si encuentra usuarios de juegos
                    if(!is_null($usergame) ){
                      
                         //Marcar al ganador que si perdio!         
                         $perdedor_casa->resultado_reto = 2;
                         $perdedor_casa->save();

                    }
          }

           //Buscando perdedores en marcador visita
          $perdedores_visita=PartidoRetoPuntos::where('partido_id',$partidoid)->where('marcador_casa',$marcadorcasa)->where('marcador_visita','!=',$marcadorvisita)->get();
          foreach ($perdedores_visita as $perdedor_visita) {
            //Contador de listado de ganadores
            $usergame=UserGame::where('user_id',$perdedor_visita->user_id)->first();
                //Si encuentra usuarios de juegos
                    if(!is_null($usergame) ){
                      
                         //Marcar al ganador que si perdio!         
                         $perdedor_visita->resultado_reto = 2;
                         $perdedor_visita->save();

                    }
          }

           //Buscando perdedores diferentes a marcadores
          $perdedores=PartidoRetoPuntos::where('partido_id',$partidoid)->where('marcador_casa','!=',$marcadorcasa)->where('marcador_visita','!=',$marcadorvisita)->get();
          foreach ($perdedores as $perdedor) {
            //Contador de listado de ganadores
            $usergame=UserGame::where('user_id',$perdedor->user_id)->first();
                //Si encuentra usuarios de juegos
                    if(!is_null($usergame) ){
                      
                         //Marcar al ganador que si perdio!         
                         $perdedor->resultado_reto = 2;
                         $perdedor->save();

                    }
          }



       Session::flash('message','Resultado asignado correctamente.');
       return Redirect::to('/partidos/show/'. $resultado->partido_id);
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

   
}
