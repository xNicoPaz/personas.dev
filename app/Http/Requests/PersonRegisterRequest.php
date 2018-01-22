<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonRegisterRequest extends FormRequest
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
            'first_name' => 'required|alpha_spaces|max:100',
            'last_name' => 'required|alpha_spaces|max:100',
            'dni' => 'required|integer|digits_between:7,8|unique:people,dni',
            'birthdate' => 'required|date',
            'picture' => 'nullable|image',
            'address' => 'required|alpha_num_spaces|max:100',
            'town_id' => 'required|integer|exists:towns,id'
        ];
    }

    public function messages(){
        return [
            'first_name.required' => 'El nombre es obligatorio',
            'first_name.alpha_spaces' => 'El nombre solo puede contener letras y espacios',
            'first_name.max' => 'El nombre solo puede contener hasta 100 caracteres',
            'last_name.required' => 'El apellido es obligatorio',
            'last_name.alpha_spaces' => 'El apellido solo puede contener letras y espacios',
            'last_name.max' => 'El apellido solo puede contener hasta 100 caracteres',
            'dni.required' => 'El DNI es obligatorio',
            'dni.integer' => 'El DNI debe ser un numero entero, no ingrese puntos ni comas',
            'dni.digits_between' => 'El DNI debe tener entre 7 y 8 digitos',
            'dni.unique' => 'Este DNI ya se encuentra registrado',
            'birthdate.required' => 'La fecha de nacimiento es obligatoria',
            'birthdate.date' => 'La fecha de nacimiento es incorrecta',
            'picture.image' => 'La imagen debe ser un archivo de imagen valido (png, jpeg, etc)',
            'address.required' => 'La dirección es obligatoria',
            'address.alpha_num_spaces' => 'La dirección solo puede contener letras, numeros y espacios',
            'address.max' => 'La dirección solo puede contener hasta 100 caracteres',
            'town_id.required' => 'Debe seleccionar una localidad registrada',
            'town_id.integer' => 'La localidad ingresada es incorrecta',
            'town_id.exists' => 'La localidad ingresada no se encuentra registrada'

        ];
    }
}
