<?php

namespace App\Http\Requests\Supply;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SupplyCompanyUpdateRequest extends FormRequest
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
            'code' => [
                'required',
                'min:6',
                Rule::unique('inventory_warehouse_center_supply_companies')->ignore($this->supply_company),
            ],
            'title' => [
                'required',
                Rule::unique('inventory_warehouse_center_supply_companies')->ignore($this->supply_company),
            ],
            'address' => 'required',
            'number' => 'required',
            'district' => 'required',
            'city_id' => 'required',
            'type_establishment_id' => 'required',
            'financial_block_id' => 'required',
        ];
    }
}
