<?php

namespace Doncampeon\Models;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'dc_pais';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['created_at','updated_at'];

   
}
