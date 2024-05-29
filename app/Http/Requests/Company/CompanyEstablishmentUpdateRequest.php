<?php

namespace App\Http\Requests\Company;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CompanyEstablishmentUpdateRequest extends FormRequest
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
            'code' => [
                'required',
                'min:6',
                Rule::unique('company_establishments')->ignore($this->establishment),
            ],
            'title' => [
                'required',
                Rule::unique('company_establishments')->ignore($this->establishment),
            ],
            'address' => 'required',
            'number' => 'required',
            'district' => 'required',
            'city_id' => 'required',
            'type_establishment_id' => 'required',
            'financial_block_id' => 'required',
        ];
    }
}
