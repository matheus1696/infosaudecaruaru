<?php

namespace App\Http\Requests\Professional;

use Illuminate\Foundation\Http\FormRequest;

class StoreProfessionalDoctorRequest extends FormRequest
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
            'name' => 'nullable|min:5|max:50',
            'crm' => 'nullable|min:4',
            'specialty' => 'required',
            'contact_1' => 'nullable|celular_com_ddd',
            'contact_2' => 'nullable|celular_com_ddd',
        ];
    }
}
