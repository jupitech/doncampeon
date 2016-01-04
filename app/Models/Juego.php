<?php

namespace Doncampeon\Models;

use Illuminate\Database\Eloquent\Model;

class Juego extends Model
{
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'game_parametros';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['puntos_iniciales','puntos_recompensa','minimo_retos','recompensa_nojuegos','recompensa_pjuegos'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['created_at','updated_at'];
}
