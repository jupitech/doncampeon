<?php

namespace Doncampeon\Http\Controllers;

use Illuminate\Http\Request;
use Doncampeon\Http\Requests;
use Session;
use Redirect;
use Doncampeon\Http\Controllers\Controller;
use Doncampeon\Models\GameNivel;

class GameNivelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
           $game_nivel=GameNivel::All();
         return view('admin.juego.nivelgame',compact('game_nivel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.juego.nuevonivel');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        GameNivel::create([
                'nivel_nombre' =>$request['nivel_nombre'],
                'nivel_alias'   =>$request['nivel_alias'],
                'nivel_puntos'   =>$request['nivel_puntos'],
                'nivel_minimo'   =>$request['nivel_minimo'],
                'nivel_bonus'   =>$request['nivel_bonus'],
                'imagen_nivel'   =>$request['imagen_nivel'],
                'thumb_nivel'   =>$request['thumb_nivel'],
            ]);
       Session::flash('message','Nivel creado correctamente.');
        return Redirect::to('/nivelgame');
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
         $game_parametro=GameNivel::find($id);
         $game_parametro->fill($request->all());
         $game_parametro->save();
         Session::flash('message','Nivel cambiado correctamente.');
         return Redirect::to('/nivelgame');
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
