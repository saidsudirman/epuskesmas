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
        Schema::create('massage_chats', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('dokter_id');
            $table->enum('sender', ['user', 'bot', 'dokter']);;
            $table->text('message');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('massage_chats');
    }
};
