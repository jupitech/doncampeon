<?php

namespace Doncampeon\Models;

use Illuminate\Database\Eloquent\Model;

class UserGame extends Model
{
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'user_game';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id','equipo_nacional','equipo_internacional','puntos_iniciales','puntos_acumulados','nivel_id'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['created_at','updated_at'];

      public function getNivel(){
        return \Doncampeon\Models\GameNivel::where('id',$this->nivel_id)->first()->nivel_nombre;
    }
}
