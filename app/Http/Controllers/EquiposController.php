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
use Doncampeon\Models\Ligasequipos;
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
        $equipos=Equipos::All();
         return view('admin.partidos.equipos',compact('equipos'));


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
