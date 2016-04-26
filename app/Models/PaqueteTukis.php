<?php

namespace Doncampeon\Models;

use Illuminate\Database\Eloquent\Model;

class PaqueteTukis extends Model
{
       /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'paquete_tukis';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre_paquete','tukis_paquete','cantidad_max','monto_dolar','monto_quetzal','fee_paquete','neto_dolar','neto_quetzal','paquete_activado'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['created_at','updated_at'];
}
