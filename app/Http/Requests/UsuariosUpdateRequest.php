<?php

namespace Doncampeon\Http\Requests;

use Doncampeon\Http\Requests\Request;

class UsuariosUpdateRequest extends Request
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
             'first_name' => 'required',
             'last_name' => 'required',
             'password_confirmation' => 'same:password',
        ];
    }
     public function messages()
    {
        return [
            'first_name.required'=>'Ingresa el nombre usuario',
            'last_name.required'=>'Ingresa el apellido usuario',
             'password_confirmation.same'=>'El password no es igual',
        ];
    }
}
