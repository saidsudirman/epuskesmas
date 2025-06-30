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
        Schema::create('informasi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pelayanan_id');
            $table->string('jam_operasional');
            $table->text('visi')->nullable();
            $table->text('misi')->nullable();
            $table->text('layanan')->nullable();
            $table->text('pengumuman')->nullable();
            $table->timestamps();

            // definisi foreign key
            $table->foreign('pelayanan_id')->references('id')->on('pelayanan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('informasi');
    }
};
