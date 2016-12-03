<?php

namespace Doncampeon\Models;

use Illuminate\Database\Eloquent\Model;
use Doncampeon\Models\Equipos;
use Doncampeon\Models\LigasEquipos;

class Equipos extends Model{
   
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'dc_equipos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','nombre_equipo', 'alias', 'pais_equipo'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['remember_token','created_at','updated_at'];

    public function getPaisNombre(){
        return \Doncampeon\Models\Pais::where('id',$this->pais_equipo)->first()->nombre;
    }

    public function getLigasEquipo($id){
        $equipoliga= \Doncampeon\Models\LigasEquipos::where('equipos_id',$id)->get();
        return $equipoliga;
    }
    

    public function getLigasSin(){
        $lasligas= \Doncampeon\Models\Ligas::orderBy('id','ASC')->lists('nombre_liga','id');
        return $lasligas;
    }
     

    public function LigasEquipo(){
        return $this->hasMany('\Doncampeon\Models\LigasEquipos','equipos_id','id')->with("Nombreliga");
    } 

    public function NombrePais(){
        return $this->hasOne('\Doncampeon\Models\Pais','id','pais_equipo');
    } 


}
