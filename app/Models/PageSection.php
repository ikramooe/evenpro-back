<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageSection extends Model
{
    protected $fillable = ['name', 'content'];

    protected $casts = [
        'content' => 'array'
    ];

    public static function getContent($name, $default = [])
    {
        $section = self::where('name', $name)->first();
        return $section ? $section->content : $default;
    }

    public static function updateContent($name, $content)
    {
        return self::updateOrCreate(
            ['name' => $name],
            ['content' => $content]
        );
    }
}
