<?php

namespace App\Http\Requests\InventoryWarehouse\InventoryWarehouseStoreRoom;

use Illuminate\Foundation\Http\FormRequest;

class StoreInventoryWarehouseStoreRoomCreateRequest extends FormRequest
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
            'title'=>'required|min:5',
            'department_contact'=>'required|celular_com_ddd',
            'department_extension'=>'required|max_digits:4|min_digits:4',
            'user_contact_1'=>'required|celular_com_ddd',
            'user_contact_2'=>'required|celular_com_ddd',
        ];
    }
}
