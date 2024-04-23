<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEventRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    
    public function rules(): array
    {
        return [
            'venue'=> ['required', 'string'],
            'event_date'=> ['required', 'date'],
            'venue_time_start' => ['required', 'date_format:H:i'],
            'venue_time_end' => ['required', 'date_format:H:i'], 
            'address' => ['required', 'string'],
            'point_person'=> ['required', 'string'],
            'mobile_number'=> ['required', 'string'],
            'remarks'=> ['required', 'string'],
        ];
    }
}
