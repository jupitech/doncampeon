<?php

namespace Doncampeon\Models;

use Illuminate\Database\Eloquent\Model;

class GameNivel extends Model
{
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'game_nivel';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nivel_nombre','nivel_alias','nivel_puntos','nivel_minimo','nivel_bonus','imagen_nivel','thumb_nivel'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['created_at','updated_at'];
}
