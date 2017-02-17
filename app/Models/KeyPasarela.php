<?php

namespace Doncampeon\Models;

use Illuminate\Database\Eloquent\Model;

class KeyPasarela extends Model
{
      /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'key_pasarela';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','publickey','secretkey','estado_key'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['created_at','updated_at'];
}
