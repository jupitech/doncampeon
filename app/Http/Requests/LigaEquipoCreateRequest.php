<?php

namespace Doncampeon\Http\Requests;

use Doncampeon\Http\Requests\Request;

class LigaEquipoCreateRequest extends Request
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
            'ligas_id'=>'required|unique:ligas_equipos',
             'alias'=>'required',
        ];
    }
}
