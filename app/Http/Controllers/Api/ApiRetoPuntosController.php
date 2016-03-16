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

class ApiRetoPuntosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $retopuntos=PartidoRetoPuntos::create([
                'user_id' =>$request['user_id'],
                'partido_id' =>$request['partido_id'],
                'marcador_casa' =>$request['marcador_casa'],
                'marcador_visita' =>$request['marcador_visita'],
                'cantidad_reto' =>$request['cantidad_reto'],
            ]);
        $retopuntos->save();
        $usergame=UserGame::where('user_id',$retopuntos->user_id)->first();
        $puntos=$usergame->puntos_acumulados;

        $restar_puntos=$puntos-$request['cantidad_reto'];


        $usergame->fill([
                'puntos_acumulados' => $restar_puntos,
            ]);
        $usergame->save();

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
