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
    protected $fillable = ['nombre_equipo', 'alias', 'pais_equipo'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['remember_token'];

    public function getPaisNombre(){
        return \Doncampeon\Models\Pais::where('id',$this->pais_equipo)->first()->nombre;
    }
}
