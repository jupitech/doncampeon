<?php

namespace Doncampeon\Http\Requests;

use Doncampeon\Http\Requests\Request;

class LigasCreateRequest extends Request
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
            'nombre_liga'=>'required|unique:dc_ligas',
        ];
    }
    
    public function messages()
    {
        return [
            'nombre_liga.required'=>'Ingresa el nombre de la liga',
            'nombre_liga.unique'=>'La liga ya ha sido registrada',
        ];
    }
}
