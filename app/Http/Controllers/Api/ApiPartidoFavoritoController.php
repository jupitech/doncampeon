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
use Doncampeon\Models\PartidoFavorito;


class ApiPartidoFavoritoController extends Controller
{
     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $partidofav=PartidoFavorito::create([
                'user_id' =>$request['user_id'],
                'partido_id' =>$request['partido_id'],
                'partido_act' =>1,
            ]);
            $partidofav->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($user_id,$partido_id)
    {
                 //Traendo partidos que no han sido terminados en esta semana
        $partidofav=PartidoFavorito::where('user_id',$user_id)->where('partido_id',$partido_id)->first();
        if(!$partidofav){
             return response()->json(['mensaje' =>  'No se encuentran partidos favoritos actualmente','codigo'=>404],404);
        }
         return response()->json(['datos' =>  $partidofav],200);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user_id,$partido_id)
    {
        $partidofav=PartidoFavorito::where('user_id',$user_id)->where('partido_id',$partido_id)->first();
        $partidofav->fill([
                'partido_act' =>$request['partido_act'],
            ]);
        $partidofav->save();
    }

}
