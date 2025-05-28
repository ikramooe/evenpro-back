<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventPage extends Model
{
    protected $fillable = [
        'event_id',
        'type', // welcome, media, registration, exhibitors
        'content',
        'active',
        'order'
    ];

    protected $casts = [
        'content' => 'json',
        'active' => 'boolean'
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
