<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'level_id' => 'required|numeric|exists:levels,id',
            'name' => 'required|string|between:3,50',
            'lastname' => 'required|string|between:3,50',
            'email' => 'required|email|unique:users,email,'.$this->user->id,
            'password' => 'nullable|string|between:6,50|exclude_if:password,null',
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
