<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventRegistration extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'event_form_id',
        'first_name',
        'last_name',
        'email',
        'phone',
        'address',
        'company',
        'status'
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function form()
    {
        return $this->belongsTo(EventForm::class, 'event_form_id');
    }
}
