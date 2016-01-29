<?php

namespace Doncampeon\Http\Controllers\Api;

use Illuminate\Http\Request;

use Doncampeon\Http\Requests;
use Doncampeon\Http\Controllers\Controller;
use Doncampeon\Models\PartidoCalendario;
use Carbon\Carbon;
use JWTAuth;
use Illuminate\Support\Facades\Hash;
use Doncampeon\User;
use Tymon\JWTAuth\Exceptions\JWTException;

class ApiPartidoCalendarioController extends Controller
{

     public function __construct()
   {
       // Apply the jwt.auth middleware to all methods in this controller
       // except for the authenticate method. We don't want to prevent
       // the user from retrieving their token if they don't already have it
    // $this->middleware('jwt.auth');
   }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexsemana()
    {
            //Traendo partidos que no han sido terminados en este dia
        $partidos=PartidoCalendario::with("EquipoCasaNombre","EquipoVisitaNombre","NombreLiga")->orderBy('fecha_partido','ASC')->orderBy('hora_partido','ASC')->where('fecha_partido','>=',Carbon::today())->where('fecha_partido','<=',Carbon::today()->endOfWeek())->get();
        if(!$partidos){
             return response()->json(['mensaje' =>  'No se encuentran partidos actualmente','codigo'=>404],404);
        }
         return response()->json(['datos' =>  $partidos],200);
        
    }

       public function indexhoy()
    {
          //Traendo partidos que no han sido terminados en este dia
         $partidoshoy=PartidoCalendario::with("EquipoCasaNombre","EquipoVisitaNombre","NombreLiga")->orderBy('hora_partido','ASC')->where('fecha_partido','=',Carbon::today())->get();
         if(!$partidoshoy){
             return response()->json(['mensaje' =>  'No se encuentran partidos actualmente','codigo'=>404],404);
        }
         return response()->json(['datos' =>  $partidoshoy],200);
    }

     public function indexmes()
    {
          //Traendo partidos que no han sido terminados en este dia
         $partidosmes=PartidoCalendario::with("EquipoCasaNombre","EquipoVisitaNombre","NombreLiga")->orderBy('fecha_partido','ASC')->orderBy('hora_partido','ASC')->where('fecha_partido','>=',Carbon::today())->where('fecha_partido','<=',Carbon::today()->endOfMonth())->get();
         if(!$partidosmes){
             return response()->json(['mensaje' =>  'No se encuentran partidos actualmente','codigo'=>404],404);
        }
         return response()->json(['datos' =>  $partidosmes],200);
    }

    
}
