<?php

namespace App\Http\Requests\InventoryFoodstuff\InventoryFoodstuffStandardRequest;

use Illuminate\Foundation\Http\FormRequest;

class StoreInventoryFoodstuffStandardRequestListRequest extends FormRequest
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
            'quantity'=>'required|integer',
            'consumable_id'=>'required',
            'standard_request_id'=>'required',
        ];
    }
}
