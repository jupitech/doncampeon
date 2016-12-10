<?php

namespace Doncampeon\Http\Controllers;

use Illuminate\Http\Request;
use Doncampeon\Http\Requests;
use Session;
use Redirect;
use Doncampeon\Http\Controllers\Controller;
use Doncampeon\Http\Requests\EquiposCreateRequest;
use Doncampeon\Http\Requests\LigaEquipoCreateRequest;
use Doncampeon\Http\Requests\EquiposUpdateRequest;
use Doncampeon\Models\Equipos;
use Doncampeon\Models\LigasEquipos;
use Doncampeon\Models\PorGanador;
use Doncampeon\Models\MultiGanador;
use JWTAuth;

class EquiposController extends Controller
{

    public function __contruct(){
       $this->middleware('auth.basic');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return view('admin.partidos.equipos');


    }



     public function indexequipos()
    {
        $equipos=Equipos::with("NombrePais","LigasEquipo")->get();
           if(!$equipos){
                return response()->json(['mensaje' =>  'No se encuentran equipos actualmente','codigo'=>404],404);
             }
         return response()->json(['datos' =>  $equipos],200);


    }


     public function indexligasasig($id)
    {
        $ligasequipos=LigasEquipos::with("Nombreliga")->where("equipos_id",$id)->get();
           if(!$ligasequipos){
                return response()->json(['mensaje' =>  'No se encuentran ligas actualmente','codigo'=>404],404);
             }
         return response()->json(['datos' =>  $ligasequipos],200);


    }

      public function indexligasganador($id)
    {
        $ligasequipos=PorGanador::with("Nombreliga")->where("id_equipo",$id)->get();
           if(!$ligasequipos){
                return response()->json(['mensaje' =>  'No se encuentran ligas actualmente','codigo'=>404],404);
             }
         return response()->json(['datos' =>  $ligasequipos],200);


    }

      public function indexligasequipos($id)
    {
        $ligasequipos=LigasEquipos::with("NombreEquipo")->where("ligas_id",$id)->get();
           if(!$ligasequipos){
                return response()->json(['mensaje' =>  'No se encuentran equipos actualmente','codigo'=>404],404);
             }
         return response()->json(['datos' =>  $ligasequipos],200);


    }


      public function indexmultiganador($id)
    {


        $multiganador=MultiGanador::with("EquipoVisita")->where("id_porganador",$id)->get();
           if(!$multiganador){
                return response()->json(['mensaje' =>  'No se encuentran multiplicadores actualmente','codigo'=>404],404);
             }
         return response()->json(['datos' =>  $multiganador],200);


    }




private function transformEquipos($equiposp){
    return array_map([$this, 'transform'], $equiposp->toArray());
}

private function transform($equiposp){
    return [
           'id' => $equiposp['id'],
           'nombre_equipo' => $equiposp['nombre_equipo'],
           'pais_equipo' => $equiposp['pais_equipo'],
           'alias' => $equiposp['alias'],
        ];
}

 public function indexp()
    {
      $equiposp=Equipos::all();
        return response()->json(
            ['datos'=> $this->transformEquipos($equiposp)],200
           
            );

         
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.partidos.nuevoequipo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EquiposCreateRequest $request)
    {
        Equipos::create([
                'nombre_equipo' =>$request['nombre_equipo'],
                'alias'   =>$request['alias'],
                'pais_equipo'   =>$request['pais_equipo'],
            ]);
       Session::flash('message','Equipo creado correctamente.');
        return Redirect::to('/equipos');
    }

     public function storeligas(Request $request)
    {
        Ligasequipos::create([
                'ligas_id' =>$request['ligas_id'],
                'equipos_id'   =>$request['equipos_id'],
            ]);
       Session::flash('message','Equipo asignado correctamente.');
        return Redirect::to('/equipos');
    }

    public function storeligaganador(Request $request)
    {

        $idliga=$request['id_liga'];
        $idequipo=$request['id_equipo'];
        
        $porganador=PorGanador::where('id_liga',$idliga)->where('id_equipo',$idequipo)->first();

        if(!$porganador){
            PorGanador::create([
                'id_liga' =>$idliga,
                'id_equipo'   =>$idequipo,
                'estado_ganador'   =>1,
            ]);
        }else{
              return response()->json(['idporganador' =>  $porganador->id],404);
        }
        
    }

     public function storemultiganador(Request $request)
    {

        $visitaequipo=$request['visita_equipo'];
        $idganador=$request['id_porganador'];
        
        $multiganador=MultiGanador::where('id_porganador',$idganador)->where('visita_equipo',$visitaequipo)->first();

        if($multiganador==null){
            MultiGanador::create([
                'visita_equipo' =>$visitaequipo,
                'id_porganador'   =>$idganador,
                'resultado_casa'   =>$request['resultado_casa'],
                'resultado_empate'   =>$request['resultado_empate'],
                'resultado_visita'   =>$request['resultado_visita'],
                'probabilidad_casa'   =>$request['probabilidad_casa'],
                'probabilidad_empate'   =>$request['probabilidad_empate'],
                'probabilidad_visita'   =>$request['probabilidad_visita'],
                'multi_casa'   =>$request['multi_casa'],
                'multi_empate'   =>$request['multi_empate'],
                'multi_visita'   =>$request['multi_visita'],
                'estado_multi'   =>1,
            ]);
        }else{
              return response()->json(['idmulti_ganador' =>  $multiganador->id],404);
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
        $equipos=Equipos::find($id);
        return view('admin.partidos.editarequipo',['equipos'=>$equipos]);
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
        $equipos=Equipos::find($id);
        $equipos->fill($request->all());
        $equipos->save();
        Session::flash('message','Equipo "'.$equipos->nombre_equipo.'" editado correctamente.');
        return Redirect::to('/equipos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          Equipos::destroy($id);
         Session::flash('message','Equipo eliminado correctamente.');
        return Redirect::to('/equipos');
    }

    public function destroyliga($id)
    {
          Ligasequipos::destroy($id);
         Session::flash('message','Liga desasignada correctamente.');
        return Redirect::to('/equipos');
    }
}
