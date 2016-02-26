<?php

namespace Doncampeon\Models;

use Illuminate\Database\Eloquent\Model;

class PartidoResultado extends Model
{
      /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'partido_resultado';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['partido_id','marcador_casa','marcador_visita'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['created_at','updated_at'];
}
