<?php

namespace Doncampeon\Http\Requests;

use Doncampeon\Http\Requests\Request;

class LigasUpdateRequest extends Request
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
            'nombre_liga'=>'required',
        ];
    }
    
    public function messages()
    {
        return [
            'nombre_liga.required'=>'Ingresa el nombre de la liga',
        ];
    }
}
