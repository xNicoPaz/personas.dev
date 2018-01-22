<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TownRegisterRequest extends FormRequest
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
            'province_id' => 'required|integer|exists:provinces,id'
        ];
    }

    public function messages(){
        return [
            'name.required' => 'El nombre es obligatorio',
            'name.alpha_spaces' => 'El nombre solo puede contener letras y espacios',
            'name.max' => 'El nombre solo puede contener hasta 100 caracteres',
            'province_id.required' => 'Debe seleccionar una provincia registrada',
            'province_id.integer' => 'La provincia ingresada es incorrecta',
            'province_id.exists' => 'La provincia ingresada no se encuentra registrada'
        ];
    }
}
