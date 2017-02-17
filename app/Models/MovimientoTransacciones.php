<?php

namespace Doncampeon\Models;

use Illuminate\Database\Eloquent\Model;

class MovimientoTransacciones extends Model
{
        /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'movimiento_transacciones';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['respuesta','user_id','id_paquete','transaccion','created_at'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['updated_at'];
}
