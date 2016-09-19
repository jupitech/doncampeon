<?php

namespace Doncampeon;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Bican\Roles\Traits\HasRoleAndPermission;
use Bican\Roles\Contracts\HasRoleAndPermission as HasRoleAndPermissionContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword,HasRoleAndPermission,SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['username', 'email', 'password','api_token'];


    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token','created_at','updated_at','first_name','last_name','deleted_at'];
     protected $dates = ['deleted_at'];

    public function RolUsuario(){
        return $this->hasOne('\Doncampeon\Models\RoleUser','user_id','id');
    }

    public function getRolNombre(){
        return \Doncampeon\Models\Roles::where('id',$this->RolUsuario->role_id)->first()->name;
    }
     public function getRolLevel(){
        return \Doncampeon\Models\Roles::where('id',$this->RolUsuario->role_id)->first()->level;
    }
       public function getUserProfile(){
        return \Doncampeon\Models\UserProfile::with("PaisNomUsuario")->where('user_id',$this->id)->first();
    }

         public function getUserGame(){
        return \Doncampeon\Models\UserGame::where('user_id',$this->id)->first();
    }
     

       public function InfoUsuario(){
        return $this->hasOne('\Doncampeon\Models\UserProfile','user_id','id');
    }


}
