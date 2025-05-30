<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('beasiswa_favorit', function (Blueprint $table) {
            $table->enum('prioritas', ['Tinggi', 'Sedang', 'Rendah'])->default('Sedang');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('beasiswa_favorit', function (Blueprint $table) {
            $table->dropColumn('prioritas');
        });
    }
};
