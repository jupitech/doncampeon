<?php
namespace Doncampeon\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class PartidoCalendario extends Model
{
      /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'partido_calendario';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['equipo_casa','equipo_visita','liga','estadio','descripcion','fecha_partido','hora_partido','editor_id','partido_ter'];
    protected $dates =['fecha_partido'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['created_at','updated_at'];

    public function setFechaPartidoAttribute($date){
      
        $this->attributes['fecha_partido'] = Carbon::parse($date);
    }

      public function EquipoCasa(){
        return $this->hasOne('\Doncampeon\Models\Equipos','id','equipo_casa');
    }
      public function EquipoCasaNombre(){
        return $this->hasOne('\Doncampeon\Models\Equipos','id','equipo_casa');
    }
    public function EquipoVisita(){
        return $this->hasOne('\Doncampeon\Models\Equipos','id','equipo_visita');
    }

     public function EquipoVisitaNombre(){
        return $this->hasOne('\Doncampeon\Models\Equipos','id','equipo_visita');
    }
     public function NombreLiga(){
        return $this->hasOne('\Doncampeon\Models\Ligas','id','liga');
    }

     public function PartidoFavorito(){
        return $this->hasOne('\Doncampeon\Models\PartidoFavorito','partido_id','id');
    }

     public function ProbabilidadLiga(){
        return $this->hasMany('\Doncampeon\Models\ProbabilidadesLigas','ligas_id','liga');
    }
}
