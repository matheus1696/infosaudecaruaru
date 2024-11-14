<?php

namespace App\Http\Requests\Consumable;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateConsumableRequest extends FormRequest
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
                Rule::unique('consumables')->ignore($this->consumable),
            ],
            'title' => 'required',
            'consumable_classification_id' => 'required',
            'consumable_unit_id' => 'required',
            'consumable_type_id' => 'required',
        ];
    }
}
