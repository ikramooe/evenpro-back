<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use Translatable;
    
    public $translatedAttributes = ['title', 'description', 'location', 'slug'];
    
    protected $fillable = [
        'image',
        'start_date',
        'slug',
        'end_date',
        'active',
        'order'
    ];
    
    protected $casts = [
        'active' => 'boolean',
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];

    public function pages()
    {
        return $this->hasMany(EventPage::class);
    }

    public function forms()
    {
        return $this->hasMany(EventForm::class)->orderBy('order');
    }
}
