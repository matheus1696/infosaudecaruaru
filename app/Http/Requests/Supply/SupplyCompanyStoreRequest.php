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
            'cnpj' => 'required|min:18|unique:supply_companies',
            'title' => 'required|min:6|unique:supply_companies',
            'address' => 'required',
            'number' => 'required',
            'district' => 'required',
            'city_id' => 'required',
            'contact_1' => 'required|min:15|max:15|celular_com_ddd',
            'contact_1' => 'nullable|min:15|max:15|celular_com_ddd',
            'email_1' => 'required|email',
            'email_2' => 'nullable|email',
        ];
    }
}
