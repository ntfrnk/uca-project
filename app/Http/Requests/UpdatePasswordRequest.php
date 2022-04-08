<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePasswordRequest extends FormRequest
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
            'old_password' => 'required|current_password|exclude',
            'password' => 'required|string|confirmed|between:6,50',
        ];
    }

    /**
     * Get the messages for validations.
     *
     * @return array
     */
    public function messages()
    {
        return config('validation.messages.user');
    }
}