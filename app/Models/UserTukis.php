<?php

namespace Doncampeon\Models;

use Illuminate\Database\Eloquent\Model;

class UserTukis extends Model
{
         /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'user_tukis';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id','token_grupo','cantidad_tukis','tipo_tukis','tukis_usados','fecha_usados','created_at'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['created_at','updated_at'];
}
