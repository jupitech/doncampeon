<?php

namespace Doncampeon\Http\Controllers\Api;

use Illuminate\Http\Request;

use Doncampeon\Http\Requests;
use Doncampeon\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use JWTAuth;
use Doncampeon\Models\Ligas;
use Tymon\JWTAuth\Exceptions\JWTException;

class ApiLigascontroller extends Controller
{

     public function __construct()
   {
       // Apply the jwt.auth middleware to all methods in this controller
       // except for the authenticate method. We don't want to prevent
       // the user from retrieving their token if they don't already have it
   $this->middleware('jwt.auth');
   }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexlistado()
    {
           //Traendo partidos que no han sido terminados en este dia
         $ligas=Ligas::orderBy('id','ASC')->get();
         if(!$ligas){
             return response()->json(['mensaje' =>  'No se encuentran ligas actualmente','codigo'=>404],404);
        }
         return response()->json(['datos' =>  $ligas],200);
    }

   
}
