<?php

namespace Doncampeon\Http\Requests;

use Doncampeon\Http\Requests\Request;

class EquiposCreateRequest extends Request
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
             'nombre_equipo'=>'required|unique:dc_equipos',
             'alias'=>'required',
        ];
    }
     public function messages()
    {
        return [
            'nombre_equipo.required'=>'Ingresa el nombre del equipo',
            'alias.required'=>'Ingresa el alias del equipo',
            'nombre_equipo.unique'=>'El equipo ya ha sido registrado',
        ];
    }
}
