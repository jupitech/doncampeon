<?php

namespace Doncampeon\Http\Controllers;

use Illuminate\Http\Request;

use Doncampeon\Http\Requests;
use Doncampeon\Http\Controllers\Controller;
use Doncampeon\Models\PartidoCalendario;
use Carbon\Carbon;
use Cache;
use Illuminate\Support\Facades\Redis;

class ResultadosPanelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
    {
          //Traendo partidos que no han sido terminados en este dia
        // $partidos=PartidoCalendario::orderBy('fecha_partido','ASC')->orderBy('hora_partido','ASC')->where('fecha_partido','<',Carbon::today())->where('partido_ter',1)->get();
        $partidos=PartidoCalendario::orderBy('fecha_partido','ASC')->orderBy('hora_partido','ASC')->where('partido_ter',1)->get();
         return view('admin.resultados.resultados',compact('partidos'));
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
