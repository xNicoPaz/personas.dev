<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\PersonRegisterRequest;

class PersonUpdateRequest extends PersonRegisterRequest
{
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
            'dni' => [
                'required',
                'integer',
                'digits_between:7,8',
                Rule::unique('dni')->ignore()
            ],
            'birthdate' => 'required|date',
            //40KB de tamaño maximo para fotos
            'picture' => 'nullable|image|max:50',
            'address' => 'required|alpha_num_spaces|max:100',
            'town_id' => 'required|integer|exists:towns,id'
        ];
    }
}
