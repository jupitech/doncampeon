<?php

namespace Doncampeon\Http\Controllers\Api;

use Illuminate\Http\Request;

use Doncampeon\Http\Requests;
use Doncampeon\Http\Controllers\Controller;
use Doncampeon\Models\UserProfile;
use Doncampeon\Models\UserGame;
use Doncampeon\Models\GameNivel;
use Carbon\Carbon;
use JWTAuth;
use Illuminate\Support\Facades\Hash;
use Doncampeon\User;
use Tymon\JWTAuth\Exceptions\JWTException;

class ApiPerfilUserController extends Controller
{

     public function __construct()
   {
      
     // $this->middleware('jwt.auth');
   }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function perfilusuario($id)
    {
               //Traendo perfil del usuario
        $perfilusuario=UserProfile::with("InfoUsuario")->orderBy('user_id','DESC')->where('user_id',$id)->get();
        if(!$perfilusuario){
             return response()->json(['mensaje' =>  'No se encuentran datos actualmente','codigo'=>404],404);
        }
         return response()->json(['datos' =>  $perfilusuario],200);
    }

     public function perfilgame($id)
    {
               //Traendo perfil del usuario
         
        $perfilusuario=UserGame::with("InfoUsuario","PerfilUsuario","EquipoNacional","EquipoInternacional","NivelGame")->orderBy('user_id','DESC')->where('user_id',$id)->get();
        if(!$perfilusuario){
             return response()->json(['mensaje' =>  'No se encuentran datos actualmente','codigo'=>404],404);
        }
        $minivel=$perfilusuario->first()->nivel_id+1;
        if($minivel>5){
            $sinivel=$perfilusuario->first()->nivel_id;
        }else{
             $sinivel=$perfilusuario->first()->nivel_id+1;
        }
        $gamenivel=GameNivel::orderBy('id','DESC')->where('id',$sinivel)->get();
         return response()->json(['datos' =>  $perfilusuario,'niveles' =>   $gamenivel],200);
    }
    
      public function gamenivel($id){
           
        if(!$gamenivel){
             return response()->json(['mensaje' =>  'No se encuentran datos actualmente','codigo'=>404],404);
        }
         return response()->json(['datos' =>  $gamenivel],200);
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

 
}
