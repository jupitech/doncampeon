<?php

namespace Doncampeon\Models;

use Illuminate\Database\Eloquent\Model;

class EquipoFavorito extends Model
{
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'equipo_favorito';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id_user','id_equipo', 'tipo_equipo', 'estado_equipo'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['created_at','updated_at'];
}
