<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => 'required|email|exists:students,email',
            'password' => 'required|string',
        ];
    }

    /**
     * Set the messages for validations
     *
     * @return array
     */
    public function messages()
    {
        return [
            'email.required' => 'Debes ingresar tu correo electrónico',
            'email.email' => 'El formato ingresado no es correcto',
            'email.exists' => 'El correo que indicas no existe en nuestro sistema',
            'password.required' => 'Debes ingresar la contraseña',
            'password.string' => 'La contraseña tiene un formato incorrecto',
        ];
    }
}
