<?php

namespace App\Http\Requests\Company;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CompanyEstablishmentDepartmentsUpdateRequest extends FormRequest
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
            'title' => 'required|min:6',
            'contact' => [
                'nullable',
                Rule::unique('company_establishment_departments')->ignore($this->establishment_department),
            ],
            'extension' => [
                'nullable',
                Rule::unique('company_establishment_departments')->ignore($this->establishment_department),
            ],
            'type_contact' => 'required',
        ];
    }
}
