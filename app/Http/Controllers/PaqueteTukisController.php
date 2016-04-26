<?php

namespace Doncampeon\Http\Controllers;

use Illuminate\Http\Request;

use Doncampeon\Http\Requests;
use Doncampeon\Http\Controllers\Controller;
use Doncampeon\Models\PaqueteTukis;

class PaqueteTukisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $paquetetukis=PaqueteTukis::All();
         return view('admin.tukis.paquetes',compact('paquetetukis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tukis.nuevopaquete');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $monto_dolar= $request['monto_dolar'];
        $monto_quetzal= $request['monto_quetzal'];
        $fee_paquete_dolar= $monto_dolar*$request['fee_porcentaje'];
        $fee_paquete_quetzal= $monto_quetzal*$request['fee_porcentaje'];
        $neto_dolar=$monto_dolar-$fee_paquete_dolar;
        $neto_quetzal=$monto_dolar-$fee_paquete_quetzal;


         PaqueteTukis::create([
                'nombre_paquete' =>$request['nombre_paquete'],
                'tukis_paquete' =>$request['tukis_paquete'],
                'cantidad_max' =>$request['cantidad_max'],
                'monto_dolar' =>$monto_dolar,
                'monto_quetzal' =>$monto_quetzal,
                'fee_paquete' =>$fee_paquete_dolar,
                'neto_dolar' =>$neto_dolar,
                'neto_quetzal' =>$neto_quetzal,
                'paquete_activado' =>1,
            ]);
         Session::flash('message','Paquete creado correctamente.');
        return Redirect::to('/tukis/paquetes');
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
         $paquetetukis=PaqueteTukis::find($id);
        return view('admin.tukis.paquetes.editar',['paquetetukis'=>$paquetetukis]);
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
        $monto_dolar= $request['monto_dolar'];
        $monto_quetzal= $request['monto_quetzal'];
        $fee_paquete_dolar= $monto_dolar*$request['fee_porcentaje'];
        $fee_paquete_quetzal= $monto_quetzal*$request['fee_porcentaje'];
        $neto_dolar=$monto_dolar-$fee_paquete_dolar;
        $neto_quetzal=$monto_dolar-$fee_paquete_quetzal;


        $paquetetukis=PaqueteTukis::find($id);
        $paquetetukis->fill([
                 'nombre_paquete' =>$request['nombre_paquete'],
                'tukis_paquete' =>$request['tukis_paquete'],
                'cantidad_max' =>$request['cantidad_max'],
                'monto_dolar' =>$monto_dolar,
                'monto_quetzal' =>$monto_quetzal,
                'fee_paquete' =>$fee_paquete_dolar,
                'neto_dolar' =>$neto_dolar,
                'neto_quetzal' =>$neto_quetzal,
                'paquete_activado' =>$request['paquete_activado'],
            ]);
        $paquetetukis->save();
        


        Session::flash('message','Paquete editado correctamente.');
        return Redirect::to('/tukis/paquetes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         PaqueteTukis::destroy($id);
         Session::flash('message','Paquete eliminado correctamente.');
        return Redirect::to('/tukis/paquetes');
    }
}
