<?php

namespace Doncampeon\Models;

use Illuminate\Database\Eloquent\Model;

class ProbabilidadesLigas extends Model
{
   //  use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'probabilidad_ligas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['ligas_id','marcador_casa','marcador_visita','no_partidos','probabilidad_por','duplicador'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['created_at','updated_at'];

}
