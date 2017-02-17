<?php

namespace Doncampeon\Models;

use Illuminate\Database\Eloquent\Model;

class TukisComprados extends Model
{
       /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tukis_comprados';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['codigo','transaccion','respuesta','user_id','id_paquete','cantidad','created_at'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['updated_at'];
}
