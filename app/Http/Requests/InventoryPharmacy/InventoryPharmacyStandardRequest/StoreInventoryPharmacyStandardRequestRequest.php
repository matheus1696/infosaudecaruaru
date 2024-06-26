<?php

namespace App\Http\Requests\InventoryPharmacy\InventoryPharmacyStandardRequest;

use Illuminate\Foundation\Http\FormRequest;

class StoreInventoryPharmacyStandardRequestRequest extends FormRequest
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
            'title'=>'required|unique:inventory_warehouse_standard_requests',
            'consumable_type_id'=>'required',
        ];
    }
}
