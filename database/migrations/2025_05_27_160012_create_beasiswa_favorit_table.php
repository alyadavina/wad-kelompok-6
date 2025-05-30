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
        Schema::create('beasiswa_favorit', function (Blueprint $table) {
             $table->id();
             $table->unsignedBigInteger('mahasiswa_id');
             $table->unsignedBigInteger('beasiswa_id');
             $table->timestamps();

             $table->foreign('mahasiswa_id')->references('id')->on('mahasiswa')->onDelete('cascade');
             $table->foreign('beasiswa_id')->references('id')->on('beasiswa')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beasiswa_favorit');
    }
};
