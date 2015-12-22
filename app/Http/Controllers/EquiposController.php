<?php

namespace Doncampeon\Http\Controllers;

use Illuminate\Http\Request;
use Doncampeon\Http\Requests;
use Session;
use Redirect;
use Doncampeon\Http\Controllers\Controller;
use Doncampeon\Http\Requests\EquiposCreateRequest;
use Doncampeon\Http\Requests\EquiposUpdateRequest;
use Doncampeon\Models\Equipos;
use JWTAuth;

class EquiposController extends Controller
{

    public function __contruct(){
        $this->middleware('jwt.auth', ['except' => ['index']]);
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

 public function indexp()
    {
      $equiposp=Equipos::all();
        return response()->json(
            ['datos'=> $equiposp],200
           
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
}
