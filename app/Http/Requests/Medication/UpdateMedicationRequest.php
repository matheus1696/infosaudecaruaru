<?php

namespace App\Http\Requests\Medication;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateMedicationRequest extends FormRequest
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
            'code' => [
                'required',
                Rule::unique('medications')->ignore($this->medication),
            ],
            'title' => 'required',
            'description' => 'nullable|min:20',
            'medication_classification_id' => 'required',
            'medication_unit_id' => 'required',
            'medication_type_id' => 'required',
        ];
    }
}
