<?php

namespace Doncampeon\Http\Requests;

use Doncampeon\Http\Requests\Request;

class PartidosCreateRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
     public function rules()
    {
        return [
             'equipo_casa'=>'required',
             'equipo_visita'=>'required|different:equipo_casa',
             'fecha_partido'=>'required',
             'hora_partido'=>'required',
        ];
    }
     public function messages()
    {
        return [
            'equipo_casa.required'=>'Ingresa el nombre del equipo de casa',
            'equipo_visita.required'=>'Ingresa el nombre del equipo de visita',
             'equipo_visita.different'=>'El equipo visita debe de ser diferente al de casa',
            'fecha_partido.required'=>'Ingresa el fecha del partido',
            'hora_partido.required'=>'Ingresa la hora del partido',
        ];
    }
}
