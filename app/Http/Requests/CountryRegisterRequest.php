<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CountryRegisterRequest extends FormRequest
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
            'name' => 'required|alpha_spaces|max:100|unique:countries,name',
        ];
    }

    public function messages(){
        return [
            'name.required' => 'El nombre es obligatorio',
            'name.alpha_spaces' => 'El nombre solo puede contener letras y espacios',
            'name.max' => 'El nombre solo puede contener hasta 100 caracteres',
            'name.unique' => 'Ya se encuentra registrado un pais con este nombre'
        ];
    }
}
