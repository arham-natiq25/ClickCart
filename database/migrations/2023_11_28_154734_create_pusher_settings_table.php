<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pusher_settings', function (Blueprint $table) {
            $table->id();
            $table->string('pusher_app_id');
            $table->string('pusher_key');
            $table->string('pusher_secret');
            $table->string('pusher_cluster');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pusher_settings');
    }
};
