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
    Schema::create('articles', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->longText('content'); // Menyimpan HTML dari Summernote
        $table->unsignedBigInteger('user_id'); // ID penulis
        $table->boolean('is_published')->default(false); // Status publikasi
        $table->timestamps();

        // Relasi dengan tabel users
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('article');
    }
};
