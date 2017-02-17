<?php

namespace Doncampeon\Http\Controllers;

use Illuminate\Http\Request;

use Doncampeon\Http\Requests;

class IntegracionesController extends Controller
{
     public function index()
    {
        return view('admin.integraciones.integraciones');
    }
}
