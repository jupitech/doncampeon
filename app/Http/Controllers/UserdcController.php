<?php

namespace Doncampeon\Http\Controllers;

use Illuminate\Http\Request;

use Doncampeon\Http\Requests;
use Doncampeon\Http\Controllers\Controller;

class UserdcController extends Controller
{

     public function __contruct(){
        $this->middleware('auth.basic');
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $userdc=\Doncampeon\Models\Userdc::get();
        return response()->json(
            $userdc->toArray()
           
            );
    }

 

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
