<?php

namespace App\Http\Requests\Supply;

use Illuminate\Foundation\Http\FormRequest;

class SupplyCompanyStoreRequest extends FormRequest
{
    /*
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'cnpj' => 'required|min:6|unique:inventory_warehouse_center_supply_companies',
            'title' => 'required|unique:inventory_warehouse_center_supply_companies',
            'address' => 'required',
            'number' => 'required',
            'district' => 'required',
            'city_id' => 'required',
        ];
    }
}
