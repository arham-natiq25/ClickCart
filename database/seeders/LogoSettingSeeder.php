<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LogoSettingSeeder extends Seeder
{
    public function run()
    {
        DB::table('logo_settings')->insert([
            [
                'logo' => 'logo.png',
                'favicon' => 'favicon.ico',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
