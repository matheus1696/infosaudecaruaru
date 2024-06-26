<?php

namespace App\Http\Requests\InventoryFoodstuff\InventoryFoodstuffStoreRoom;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInventoryFoodstuffStoreRoomRequest extends FormRequest
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
            'title'=>'nullable|min:5',
            'department_contact'=>'nullable|celular_com_ddd',
            'department_extension'=>'nullable|max_digits:4|min_digits:4',
            'user_contat_1'=>'nullable|celular_com_ddd',
            'user_contat_2'=>'nullable|celular_com_ddd',
        ];
    }
}
