<?php

namespace Doncampeon\Models;

use Illuminate\Database\Eloquent\Model;

class PorGanador extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'por_ganador';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id_liga','id_equipo','hasta_anio','estado_ganador'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['created_at','updated_at'];

    
    public function Nombreliga(){
        return $this->hasOne('\Doncampeon\Models\Ligas','id','id_liga');
    }
}
