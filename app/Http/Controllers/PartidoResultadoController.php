<?php

namespace Doncampeon\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Redirect;
use Doncampeon\Http\Requests;
use Doncampeon\Http\Controllers\Controller;
use Doncampeon\Models\PartidoCalendario;
use Doncampeon\Models\PartidoResultado;
use Carbon\Carbon;
use Cache;
use Illuminate\Support\Facades\Redis;

class PartidoResultadoController extends Controller
{
   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            //Agregando Resultado
          $resultado= PartidoResultado::create([
                'marcador_casa' =>$request['marcador_casa'],
                'marcador_visita'   =>$request['marcador_visita'],
                'partido_id'   =>$request['partido_id'],
            ]);
           $resultado->save();
           //Cambiando a partido terminado
           $partido=PartidoCalendario::where('id',$request['partido_id'])->first();
           $partido->fill([
                'partido_ter' =>1,
            ]);
           $partido->save();
       Session::flash('message','Resultado asignado correctamente.');
       return Redirect::to('/partidos/show/'. $resultado->partido_id);
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
