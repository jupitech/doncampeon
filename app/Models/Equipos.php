<?php

namespace Doncampeon\Models;

use Illuminate\Database\Eloquent\Model;

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
    protected $fillable = ['nombre_equipo', 'liga_equipo', 'pais_equipo'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['created_at','updated_at','remember_token'];

    public function getLigasNombre(){
        return \Doncampeon\Models\Ligas::where('id',$this->liga_equipo)->first()->nombre_liga;
    }
}
