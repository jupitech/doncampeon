<?php

namespace Doncampeon\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Redirect;
use Doncampeon\Http\Requests;
use Doncampeon\Http\Controllers\Controller;
use Doncampeon\Models\PartidoCalendario;

class PartidoCalendarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request)
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
