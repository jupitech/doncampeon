<?php

namespace Doncampeon\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Redirect;
use Doncampeon\Http\Requests;
use Doncampeon\Http\Controllers\Controller;
use Doncampeon\Models\Ligas;
use Doncampeon\Models\ProbabilidadesLigas;

class ProbabilidadesLigasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $ligas=Ligas::orderBy('created_at','DESC')->get();
         return view('admin.partidos.probabilidades.probabilidades',compact('ligas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          return view('admin.partidos.probabilidades.nuevaprobabilidad');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
             $probabilidades=ProbabilidadesLigas::create([
                'ligas_id' =>$request['ligas_id'],
                'marcador_casa' =>$request['marcador_casa'],
                'marcador_visita' =>$request['marcador_visita'],
                 'no_partidos' =>$request['no_partidos'],
                 'probabilidad_por' =>$request['probabilidad_por'],
                  'duplicador' =>$request['duplicador'],
            ]);
            $probabilidades->save();
        Session::flash('message','Probabilidad creada correctamente.');
        return Redirect::to('/probabilidades');
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
