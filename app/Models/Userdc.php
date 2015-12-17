<?php

namespace Doncampeon\Models;

use Illuminate\Database\Eloquent\Model;

class Userdc extends Model{
   
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'userdc';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['alias', 'name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}
