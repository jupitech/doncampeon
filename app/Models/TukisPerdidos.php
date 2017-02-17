<?php

namespace Doncampeon\Models;

use Illuminate\Database\Eloquent\Model;

class TukisPerdidos extends Model
{
               /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tukis_perdidos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id_partido','user_id','cantidad','created_at'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['updated_at'];
}
