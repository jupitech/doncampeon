<?php

namespace Doncampeon\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Redirect;
use Doncampeon\Http\Requests;
use Doncampeon\Http\Requests\PartidosCreateRequest;
use Doncampeon\Http\Controllers\Controller;
use Doncampeon\Models\PartidoCalendario;
use Carbon\Carbon;
use Cache;
use Illuminate\Support\Facades\Redis;

class PartidoCalendarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          //Traendo partidos que no han sido terminados en este dia
        $partidos=PartidoCalendario::with("NombreLiga")->orderBy('fecha_partido','ASC')->orderBy('hora_partido','ASC')->where('fecha_partido','>=',Carbon::today())->get();
         return view('admin.partidos.partidos',compact('partidos'));
    }

     public function indexjs()
    {
          
         return view('admin.partidos.partidosjs');
    }


       public function indexcalendario()
    {
          //Traendo partidos que no han sido terminados en este dia
        $partidos=PartidoCalendario::with("NombreLiga","EquipoCasa","EquipoVisita")->orderBy('fecha_partido','ASC')->orderBy('hora_partido','ASC')->where('fecha_partido','>=',Carbon::today())->get();


             if(!$partidos){
                return response()->json(['mensaje' =>  'No se encuentran partidos actualmente','codigo'=>404],404);
             }
         return response()->json(['datos' =>  $partidos],200);
    }



     public function indexhoy()
    {
          //Traendo partidos que no han sido terminados en este dia
        $partidos=PartidoCalendario::orderBy('fecha_partido','ASC')->orderBy('hora_partido','ASC')->where('fecha_partido','=',Carbon::today())->get();
         return view('admin.partidos.partidoshoy',compact('partidos'));
    }
    public function indexsemana()
    {
          //Traendo partidos que no han sido terminados en este dia
        $partidos=PartidoCalendario::orderBy('fecha_partido','ASC')->orderBy('hora_partido','ASC')->where('fecha_partido','>=',Carbon::today())->where('fecha_partido','<=',Carbon::today()->endOfWeek())->get();
         return view('admin.partidos.partidossemana',compact('partidos'));
    }
     public function index2semanas()
    {
          //Traendo partidos que no han sido terminados en este dia
        $partidos=PartidoCalendario::orderBy('fecha_partido','ASC')->orderBy('hora_partido','ASC')->where('fecha_partido','>=',Carbon::today())->where('fecha_partido','<=',Carbon::today()->endOfWeek()->addDays(7))->get();
         return view('admin.partidos.partidos2semanas',compact('partidos'));
    }
     public function indexmes()
    {
          //Traendo partidos que no han sido terminados en este dia
        $partidos=PartidoCalendario::orderBy('fecha_partido','ASC')->orderBy('hora_partido','ASC')->where('fecha_partido','>=',Carbon::today())->where('fecha_partido','<=',Carbon::today()->endOfMonth())->get();
         return view('admin.partidos.partidosmes',compact('partidos'));
    }
     
      public function indexanteriores()
    {
          //Traendo partidos que no han sido terminados en este dia
        $partidos=PartidoCalendario::orderBy('fecha_partido','DESC')->orderBy('hora_partido','ASC')->where('fecha_partido','>=',Carbon::today()->subWeek(4))->where('fecha_partido','<=',Carbon::today())->get();
         return view('admin.partidos.partidosanteriores',compact('partidos'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $laliga=$request['ligas_id'];
         return view('admin.partidos.nuevopartido',compact('laliga'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PartidosCreateRequest $request)
    {
         PartidoCalendario::create([
                'equipo_casa' =>$request['equipo_casa'],
                'equipo_visita'   =>$request['equipo_visita'],
                'liga'   =>$request['liga'],
                'descripcion'   =>$request['descripcion'],
                'fecha_partido'   =>$request['fecha_partido'],
                'hora_partido'   =>$request['hora_partido'],
                'editor_id'   =>$request['editor_id'],
            ]);
       Session::flash('message','Partido creado correctamente.');
        return Redirect::to('/partidos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $partidos=PartidoCalendario::find($id);
         return view('admin.partidos.verpartido',['partidos'=>$partidos]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $partidos=PartidoCalendario::find($id);
        return view('admin.partidos.editarpartidos',['partidos'=>$partidos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PartidosCreateRequest $request, $id)
    {
           $partidos=PartidoCalendario::find($id);
        $partidos->fill($request->all());
        $partidos->save();
        Session::flash('message','Partido del "'.$partidos->fecha_partido->format('d/m/y').'" a las "'.$partidos->hora_partido.'" editado correctamente.');
        
        if(!Cache::has('editar_calendario')){
              Cache::put('editar_calendario','Partido del "'.$partidos->fecha_partido->format('d/m/y').'" a las "'.$partidos->hora_partido.'" fue editado.',1 );
        }
      
        return Redirect::to('/partidos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         PartidoCalendario::destroy($id);
         Session::flash('message','Liga eliminada correctamente.');
        return Redirect::to('/partidos');
    }
}
