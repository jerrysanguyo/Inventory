<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $table="events";
    protected $fillable = [
        'venue', 
        'event_date', 
        'venue_time_start', 
        'venue_time_end',
        'address',
        'point_person',
        'mobile_number',
        'remarks',
        'created_by',  
        'updated_by',
    ];

    public static function getAllEvent() 
    {
        return self::all();
    }
}
