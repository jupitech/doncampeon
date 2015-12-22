<?php

namespace Doncampeon\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Redirect;
use Doncampeon\Http\Requests;
use Doncampeon\Http\Controllers\Controller;
use Doncampeon\Models\Pais;

class PaisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $pais=Pais::All();
         return view('admin.opciones.pais',compact('pais'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.opciones.nuevopais');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         Pais::create([
                'nombre' =>$request['nombre'],
              
            ]);
         Session::flash('message','Pais creado correctamente.');
        return Redirect::to('/pais');
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
        $pais=Pais::find($id);
        return view('admin.opciones.editarpais',['pais'=>$pais]);
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
        $pais=Pais::find($id);
        $pais->fill($request->all());
        $pais->save();
        Session::flash('message','Pais "'.$pais->nombre.'" editado correctamente.');
        return Redirect::to('/pais');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          Pais::destroy($id);
         Session::flash('message','Equipo eliminado correctamente.');
        return Redirect::to('/pais');
    }
}
