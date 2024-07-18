<?php

namespace App\Http\Requests\Company\Warehouse\Item;

use Illuminate\Foundation\Http\FormRequest;

class StoreItemsEntryWarehouseCenterRequest extends FormRequest
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
            'invoice'=>'required',
            'supply_order'=>'required',
            'supply_company_id'=>'required',
            'supply_order_parcel'=>'required',
            'consumable_id'=>'required',
            'quantity'=>'required|integer|min_digits:1',
        ];
    }
}
