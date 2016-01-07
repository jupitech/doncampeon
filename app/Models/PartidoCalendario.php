<?php

namespace Doncampeon\Models;

use Illuminate\Database\Eloquent\Model;

class PartidoCalendario extends Model
{
      /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'partido_calendario';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['equipo_casa','equipo_visita','liga','estadio','descripcion','fecha_partido','hora_partido','editor_id'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['created_at','updated_at'];

    
}
