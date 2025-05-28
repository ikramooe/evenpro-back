<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    public function run()
    {
        $settings = [
            'contact_email' => 'contact@example.com',
            'contact_phone' => '+1234567890',
            'contact_address' => '123 Main St, City, Country',
            'facebook_url' => 'https://facebook.com/example',
            'twitter_url' => 'https://twitter.com/example',
            'instagram_url' => 'https://instagram.com/example',
            'linkedin_url' => 'https://linkedin.com/company/example',
            'youtube_url' => 'https://youtube.com/c/example',
        ];

        foreach ($settings as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }
    }
}
