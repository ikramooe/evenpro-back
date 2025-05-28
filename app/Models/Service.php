<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use Translatable;
    
    public $translatedAttributes = ['title', 'description', 'slug'];
    
    protected $fillable = [
        'image',
        'active',
        'order'
    ];
    
    protected $casts = [
        'active' => 'boolean',
    ];
}
