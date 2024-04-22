<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventParticipants extends Model
{
    use HasFactory;
    protected $table="event_participants";
    protected $fillable=[
        'name',
        'event_id',
        'created_by',
        'updated_by',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }
}
