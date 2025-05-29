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
        Schema::create('beasiswas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_beasiswa');
            $table->text('deskripsi');
            $table->enum('kategori', ['Tel-U', 'Nasional']);
            $table->string('penyelenggara');
            $table->string('jenjang_pendidikan', 20);
            $table->date('tanggal_buka');
            $table->date('tanggal_tutup');
            $table->string('link_pendaftaran')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beasiswas');
    }
};
