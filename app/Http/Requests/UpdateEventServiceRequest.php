<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEventServiceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    
    public function rules(): array
    {
        return [
            'driver_name' => ['required', 'string'],
            'mobile_number' => ['required', 'string'],
            'plate_number' => ['required', 'string'],
            'event_id' => ['required', 'string', 'exists:events,id'],
        ];
    }
}
