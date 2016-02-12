<?php

namespace Doncampeon\Models;

use Illuminate\Database\Eloquent\Model;


class PartidoFavorito extends Model
{
      /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'partido_fav';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['partido_id','user_id','partido_act'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['created_at','updated_at'];

}
