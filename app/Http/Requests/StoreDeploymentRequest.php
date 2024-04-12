<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDeploymentRequest extends FormRequest
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
            'inventory_id' => 'required|integer|exists:inventories,id',
            'department_id' => 'required|integer|exists:departments,id',
            'issued_by' => 'required|integer|exists:users,id',
            'assigned_to' => 'required|string|max:255',
            'received_by' => 'required|string|max:255',
            'deploy_by' => 'required|integer|exists:users,id',
            'deploy_date' => 'required|date',
            'return_by' => 'string|nullable',
            'return_date' => 'date|nullable',
            'received_by_return' => 'nullable|exists:users,id',
        ];
    }
}
