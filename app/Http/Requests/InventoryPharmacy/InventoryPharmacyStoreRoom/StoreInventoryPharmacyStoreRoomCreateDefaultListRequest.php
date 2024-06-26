<?php

namespace App\Http\Requests\InventoryPharmacy\InventoryPharmacyStoreRoom;

use Illuminate\Foundation\Http\FormRequest;

class StoreInventoryPharmacyStoreRoomCreateDefaultListRequest extends FormRequest
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
            'standard_request'=>'required',
        ];
    }
}
