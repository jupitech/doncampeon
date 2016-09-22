<?php

namespace Doncampeon\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserProfile extends Model
{
        //  use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'user_profile';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id','first_name','last_name','edad','pais','direccion','facebook','twitter'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['created_at','updated_at','deleted_at'];
     protected $dates = ['deleted_at'];

     public function getPaisNombre(){
        return \Doncampeon\Models\Pais::where('id',$this->pais)->first();
    }
       public function InfoUsuario(){
        return $this->hasOne('\Doncampeon\User','id','user_id');
    }
}
