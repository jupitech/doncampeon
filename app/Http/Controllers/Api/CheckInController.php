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
use Doncampeon\Models\TukisComprados;
use Doncampeon\Models\UserTukis;
use Doncampeon\Models\MovimientoTransacciones;
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $secret=env('DONC_SECRET');
        $trsecret= $request['secret'];
        if($secret==$trsecret){

            $ahora=Carbon::now();
            $dia=$ahora->day;
            $hora=$ahora->hour;
            $minuto=$ahora->minute;
            $segundo=$ahora->second;
            
            $codigo='CO_'.$dia.$hora.$minuto.$segundo;

            //Tukis Comprados
            $comprados=TukisComprados::create([
                'codigo' =>$codigo,
                'transaccion'   =>$request['transaccion'],
                'respuesta'   =>$request['respuesta'],
                'user_id'   =>$request['user_id'],
                'id_paquete'   =>$request['id_paquete'],
                'cantidad'   =>$request['cantidad'],
            ]);
            $comprados->save();

            //Tukis a usuarios
            $usuario=UserTukis::create([
                'user_id' =>$request['user_id'],
                'token_grupo'   =>$comprados->codigo,
                'cantidad_tukis'   =>$request['cantidad'],
                'tipo_tukis'   =>1,
            ]);
            $usuario->save();

           //Movimiento transacciones
            $movimiento=MovimientoTransacciones::create([
                'user_id' =>$request['user_id'],
                 'respuesta'   =>$request['respuesta'],
                'id_paquete'   =>$request['id_paquete'],
                 'transaccion'   =>$request['transaccion'],
            ]);
            $movimiento->save();



             return response()->json(['datos' =>  'Paquete de Tukis comprados exitosamente.'],200);
        }else{
             return response()->json(['datos' =>  'API SECRET no es correto, intenta de nuevo'],400);
        }
    }

      public function fail(Request $request)
    {
        $secret=env('DONC_SECRET');
        $trsecret= $request['secret'];
        if($secret==$trsecret){

         
           //Movimiento transacciones
            $movimiento=MovimientoTransacciones::create([
                'user_id' =>$request['user_id'],
                 'respuesta'   =>$request['respuesta'],
                'id_paquete'   =>$request['id_paquete'],
                 'transaccion'   =>$request['transaccion'],
            ]);
            $movimiento->save();



             return response()->json(['datos' =>  'Status de Transaccion erronea.'],200);
        }else{
             return response()->json(['datos' =>  'API SECRET no es correto, intenta de nuevo'],400);
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
