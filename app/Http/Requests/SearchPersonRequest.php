<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchPersonRequest extends FormRequest
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
            'searchValue' => 'required|dni_or_string:100'
        ];
    }

    public function messages(){
        return [
            'searchValue.required' => 'Debe ingresar un texto para poder realizar la busqueda',
            'searchValue.dni_or_string' => 'Si ingresa un DNI, este debe tener entre 7 y 8 digitos. Si ingresa un nombre o apellido este puede tener hasta 100 caracteres. Los nombres o apellidos solo contienen letras y espacios. Los DNI solo contienen digitos'
        ];
    }
}
