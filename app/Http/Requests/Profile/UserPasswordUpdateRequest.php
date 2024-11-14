<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;

class UserPasswordUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [            
            'password_current' => 'required|min:4|current_password|regex:/^[a-zA-Z0-9!#@$%&*()+-?]+$/',
            'password' => 'required|min:4|confirmed|regex:/^[a-zA-Z0-9!#@$%&*()+-?]+$/',
        ];
    }
}