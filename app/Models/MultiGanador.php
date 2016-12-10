<?php

namespace Doncampeon\Models;

use Illuminate\Database\Eloquent\Model;

class MultiGanador extends Model
{
        /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'multi_ganador';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id_porganador','visita_equipo','resultado_casa','resultado_empate','resultado_visita','probabilidad_casa','probabilidad_empate','probabilidad_visita','multi_casa','multi_empate','multi_visita','estado_multi'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['created_at','updated_at'];

      public function EquipoVisita(){
        return $this->hasOne('\Doncampeon\Models\Equipos','id','visita_equipo');
    }
}
