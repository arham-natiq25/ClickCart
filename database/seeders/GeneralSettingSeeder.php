<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GeneralSettingSeeder extends Seeder
{
    public function run()
    {
        DB::table('general_settings')->insert([
            [
                'site_name' => 'My Website',
                'layout' => 'modern',
                'contact_email' => 'contact@mywebsite.com',
                'contact_phone' => '+123456789',
                'contact_address' => '123 Main St, City, Country',
                'map' => '<iframe src="https://maps.google.com"></iframe>',
                'currency_name' => 'USD',
                'currency_icon' => '$',
                'time_zone' => 'America/New_York',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
