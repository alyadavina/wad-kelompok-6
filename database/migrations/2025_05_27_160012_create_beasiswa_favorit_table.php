<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeasiswaFavoritTable extends Migration
{
    public function up()
    {
        Schema::create('beasiswa_favorit', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mahasiswa_id');
            $table->unsignedBigInteger('beasiswa_id');
            $table->timestamps();

            // Pastikan tabel 'mahasiswas' dan 'beasiswas' sudah ada sebelum migrasi ini dijalankan
            $table->foreign('mahasiswa_id')->references('id')->on('mahasiswas')->onDelete('cascade');
            $table->foreign('beasiswa_id')->references('id')->on('beasiswas')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('beasiswa_favorit');
    }
}
