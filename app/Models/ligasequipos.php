<?php

namespace Doncampeon\Models;

use Illuminate\Database\Eloquent\Model;

class LigasEquipos extends Model
{
   //  use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'ligas_equipos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['ligas_id','equipos_id'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['created_at','updated_at'];

    public function Nombreliga(){
        return $this->hasOne('\Doncampeon\Models\Ligas','id','ligas_id');
    }
}
