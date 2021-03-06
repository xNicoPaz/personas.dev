<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProvinceRegisterRequest extends FormRequest
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
            'name' => 'required|alpha_spaces|max:100',
            'country_id' => 'required|integer|exists:countries,id'
        ];
    }

    public function messages(){
        return [
            'name.required' => 'El nombre es obligatorio',
            'name.alpha_spaces' => 'El nombre solo puede contener letras y espacios',
            'name.max' => 'El nombre solo puede contener hasta 100 caracteres',
            'country_id.required' => 'Debe seleccionar un país registrada',
            'country_id.integer' => 'El país ingresado es incorrecto',
            'country_id.exists' => 'La provincia ingresada no se encuentra registrada'
        ];
    }
}
