<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventForm extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'type',
        'content',
        'active',
        'order'
    ];

    protected $casts = [
        'content' => 'array',
        'active' => 'boolean'
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function registrations()
    {
        return $this->hasMany(EventRegistration::class);
    }
}
