<?php

namespace Doncampeon\Models;

use Illuminate\Database\Eloquent\Model;

class TukisGanados extends Model
{
           /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tukis_ganados';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['codigo','id_partido','user_id','cantidad','created_at'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['updated_at'];
}
