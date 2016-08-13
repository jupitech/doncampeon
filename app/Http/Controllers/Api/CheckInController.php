<?php

namespace Doncampeon\Http\Controllers\Api;

use Illuminate\Http\Request;

use Doncampeon\Http\Requests;
use Doncampeon\Http\Controllers\Controller;
use Doncampeon\User;
use Doncampeon\Models\UserProfile;
use Doncampeon\Models\UserGame;
use Doncampeon\Models\GameNivel;
use Doncampeon\Models\PaqueteTukis;
use Carbon\Carbon;

class CheckInController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexuser($token)
    {
                    //Traendo perfil del usuario
        $usuario=User::with("InfoUsuario")->orderBy('id','DESC')->where('api_token',$token)->first();
        if(!$usuario){
             return response()->json(['mensaje' =>  'No se encuentran datos actualmente','codigo'=>404],404);
        }
         return response()->json(['datos' =>  $usuario],200);
    }

     public function indexpaquetes($paquete)
    {
                    //Traendo perfil del usuario
        $paquete=PaqueteTukis::orderBy('id','DESC')->where('id',$paquete)->first();
        if(!$paquete){
             return response()->json(['mensaje' =>  'No se encuentran datos actualmente','codigo'=>404],404);
        }
         return response()->json(['datos' =>  $paquete],200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        //
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
