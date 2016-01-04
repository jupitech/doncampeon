<?php

namespace Doncampeon\Http\Controllers;

use Illuminate\Http\Request;

use Doncampeon\Http\Requests;
use Doncampeon\Http\Controllers\Controller;
use Doncampeon\Models\Juego;
use Session;
use Redirect;

class JuegoParametrosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $game_parametro=Juego::find(1);
         return view('admin.juego.juego',compact('game_parametro'));
    }
    
     public function updatepuntosiniciales(Request $request, $id)
    {
        $game_parametro=Juego::find($id);
        $game_parametro->fill($request->all());
        $game_parametro->save();
         Session::flash('message','Parametro de Puntos iniciales cambiados a "'.$game_parametro->puntos_iniciales.'".');
        return Redirect::to('/juego');
    }

     public function updateminimoretos(Request $request, $id)
    {
        $game_parametro=Juego::find($id);
        $game_parametro->fill($request->all());
        $game_parametro->save();
         Session::flash('message','Parametro de Límite de Retos cambiados a "'.$game_parametro->minimo_retos.'".');
        return Redirect::to('/juego');
    }
     public function updatepuntosrecompensa(Request $request, $id)
    {
        $game_parametro=Juego::find($id);
        $game_parametro->fill($request->all());
        $game_parametro->save();
         Session::flash('message','Parametro de Puntos en el mínimo cambiados a "'.$game_parametro->puntos_recompensa.'".');
        return Redirect::to('/juego');
    }

    public function updaterecompensanojuegos(Request $request, $id)
    {
        $game_parametro=Juego::find($id);
        $game_parametro->fill($request->all());
        $game_parametro->save();
         Session::flash('message','Parametro de No. Juegos para recompensa cambiados a "'.$game_parametro->recompensa_nojuegos.'".');
        return Redirect::to('/juego');
    }

    public function updaterecompensapjuegos(Request $request, $id)
    {
        $game_parametro=Juego::find($id);
        $game_parametro->fill($request->all());
        $game_parametro->save();
         Session::flash('message','Parametro de Puntos por Recompensa de Juegos cambiados a "'.$game_parametro->recompensa_pjuegos.'".');
        return Redirect::to('/juego');
    }
   
}
