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
        Schema::table('beasiswa_favorit', function (Blueprint $table) {
            // Tambahkan kolom tanggal_difavoritkan
            $table->timestamp('tanggal_difavoritkan')->nullable()->after('beasiswa_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('beasiswa_favorit', function (Blueprint $table) {
            // Hapus kolom kalau rollback
            $table->dropColumn('tanggal_difavoritkan');
        });
    }
};
