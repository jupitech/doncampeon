<?php

namespace Doncampeon;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Bican\Roles\Traits\HasRoleAndPermission;
use Bican\Roles\Contracts\HasRoleAndPermission as HasRoleAndPermissionContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword,HasRoleAndPermission;

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
    protected $fillable = ['username', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

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
        return \Doncampeon\Models\UserProfile::where('user_id',$this->id)->first();
    }
     


}
