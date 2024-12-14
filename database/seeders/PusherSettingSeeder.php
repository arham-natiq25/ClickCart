<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PusherSettingSeeder extends Seeder
{
    public function run()
    {
        DB::table('pusher_settings')->insert([
            [
                'pusher_app_id' => '123456',
                'pusher_key' => 'pusher_key_123',
                'pusher_secret' => 'pusher_secret_123',
                'pusher_cluster' => 'mt1',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
