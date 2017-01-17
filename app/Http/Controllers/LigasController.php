<?php

namespace Doncampeon\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Redirect;
use Doncampeon\Http\Requests;
use Doncampeon\Http\Requests\LigasCreateRequest;
use Doncampeon\Http\Requests\LigasUpdateRequest;
use Doncampeon\Http\Controllers\Controller;
use Doncampeon\Models\Ligas;

class LigasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ligas=Ligas::All();
         return view('admin.partidos.ligas',compact('ligas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.partidos.nuevaliga');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LigasCreateRequest $request)
    {
           $ligas=Ligas::create([
                'nombre_liga' =>$request['nombre_liga'],
                'alias' =>$request['alias'],
                'favorito' =>$request['favorito'],
            ]);
            $ligas->save();
        Session::flash('message','Liga "'. $ligas->nombre_liga .'" creada correctamente.');
        return Redirect::to('/ligas');
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
        $ligas=Ligas::find($id);
        return view('admin.partidos.editarliga',['ligas'=>$ligas]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LigasUpdateRequest $request, $id)
    {
        $ligas=Ligas::find($id);
        $ligas->fill($request->all());
        $ligas->save();
        Session::flash('message','Liga "'.$ligas->nombre_liga.'" editada correctamente.');
        return Redirect::to('/ligas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Ligas::destroy($id);
         Session::flash('message','Liga eliminada correctamente.');
        return Redirect::to('/ligas');
    }
}
