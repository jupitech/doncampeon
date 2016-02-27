<?php

namespace Doncampeon\Models;

use Illuminate\Database\Eloquent\Model;

class PartidoRetoPuntos extends Model
{
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'partido_retopuntos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['partido_id','user_id','marcador_casa','marcador_visita','cantidad_reto'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['created_at','updated_at'];
}
