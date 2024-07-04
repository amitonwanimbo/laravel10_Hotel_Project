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
        Schema::create('laporans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Asumsi setiap laporan dibuat oleh pengguna
            $table->string('judul');
            $table->text('deskripsi');
            $table->string('image')->nullable(); // Path ke gambar yang diunggah
            $table->enum('status', ['menunggu', 'dilihat', 'diterima'])->default('menunggu');

            $table->timestamps();
             // Foreign key constraint
             $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporans');
    }
};
