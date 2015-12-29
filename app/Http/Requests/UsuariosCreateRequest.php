<?php

namespace Doncampeon\Http\Requests;

use Doncampeon\Http\Requests\Request;

class UsuariosCreateRequest extends Request
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
             'username'=>'required|unique:users',
             'email' => 'required|email|unique:users,email',
             'password' => 'required|min:7',
             'password_confirmation' => 'required|same:password',
        ];
    }
     public function messages()
    {
        return [
            'username.required'=>'Ingresa el nombre usuario',
            'username.unique'=>'El usuario ya existe',
            'password.required'=>'Ingresa el password',
            'password_confirmation.required'=>'Ingresa confirmacion de password',
             'password_confirmation.same'=>'El password no es igual',
             'password.min'=>'Ingresa mínimo 7 letras',
        ];
    }
}
