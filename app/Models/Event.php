<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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
        'status',
    ];

    public static function getAllEvent() 
    {
        return self::all();
    }

    public function eventServices()
    {
        return $this->hasMany(EventService::class, 'event_id');
    }

    public function eventParticipants()
    {
        return $this->hasMany(EventParticipants::class, 'event_id');
    }

    protected static function booted()
    {
        static::retrieved(function ($model) {
            $today = Carbon::now()->startOfDay(); 
            $eventDate = Carbon::parse($model->event_date)->startOfDay();
    
            if ($eventDate->equalTo($today) && $model->status != 'Done') {
                $model->status = 'On-going';
                $model->save();
            } elseif ($eventDate->lessThan($today) && $model->status != 'Done') {
                $model->status = 'Done';
                $model->save();
            } elseif ($eventDate->greaterThan($today) && $model->status != 'Done') {
                $model->status = 'Upcoming';
                $model->save();
            }
        });
    }
}
