<?php

namespace App\Http\Requests\Medication;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateMedicationUnitRequest extends FormRequest
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
            //
            'code' => [
                'required',
                Rule::unique('medication_units')->ignore($this->medication_unit),
            ],
            'title' => [
                'required',
                Rule::unique('medication_units')->ignore($this->medication_unit),
            ],
            'description' => 'nullable|min:20',
        ];
    }
}
