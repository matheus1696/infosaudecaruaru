<?php

namespace App\Http\Requests\Inventory\Warehouse\Item;

use Illuminate\Foundation\Http\FormRequest;

class StoreItemsEntryWarehouseStoreRoomRequest extends FormRequest
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
            'consumable_id'=>'required',
            'quantity'=>'required|integer|min_digits:1',
        ];
    }
}
