<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInventoryRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'equipment_id' => 'required|integer|exists:equipments,id',
            'serial_number' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'unit_id' => 'required|integer|exists:units,id',
            'remark' => 'required|string|max:1000',
            'pk_os' => 'string',
            'pk_ms_office' => 'string',
            'email' => 'email',
            'password' => 'string'
        ];
    }
}
