<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{
    /*
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:1|max:50',
            'cpf' => 'nullable|min:11',
            'registration' => 'nullable|min:7',
            'contact_1' => 'nullable|celular_com_ddd',
            'contact_2' => 'nullable|celular_com_ddd',
            'password' => 'nullable|min:8|confirmed|current_password',
        ];
    }
}
