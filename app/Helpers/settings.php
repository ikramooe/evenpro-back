<?php

use App\Models\Setting;

if (!function_exists('settings')) {
    function settings($key, $default = null)
    {
        $setting = Setting::where('key', $key)->first();
        if (!$setting) {
            return $default;
        }
        
        $value = $setting->value;
        $decoded = json_decode($value, true);
        
        return (json_last_error() === JSON_ERROR_NONE) ? $decoded : $value;
    }
}
