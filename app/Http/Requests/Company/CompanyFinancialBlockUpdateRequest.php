<?php

namespace App\Http\Requests\Company;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CompanyFinancialBlockUpdateRequest extends FormRequest
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
            'title' => [
                'required',
                Rule::unique('company_financial_blocks')->ignore($this->financial_block),
            ],
            'acronym' => [
                'required',
                'min:3',
                'max:15',
                'uppercase',
                Rule::unique('company_financial_blocks')->ignore($this->financial_block),
            ],
            'color' => 'required',
        ];
    }
}
