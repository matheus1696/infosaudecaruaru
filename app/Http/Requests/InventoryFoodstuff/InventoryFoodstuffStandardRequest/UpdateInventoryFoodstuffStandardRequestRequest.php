<?php

namespace App\Http\Requests\InventoryFoodstuff\InventoryFoodstuffStandardRequest;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateInventoryFoodstuffStandardRequestRequest extends FormRequest
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
            'title' => [
                'required',
                Rule::unique('inventory_warehouse_standard_requests')->ignore($this->standard_request),
            ],
            'consumable_type_id'=>'required',
        ];
    }
}
