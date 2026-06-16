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
    Schema::table('gaji', function (Blueprint $table) {
        $table->unsignedBigInteger('storan_id')->nullable();
        $table->foreign('storan_id')->references('id')->on('storan');

        $table->unsignedBigInteger('storan_anggota_id')->nullable();
        $table->foreign('storan_anggota_id')->references('id')->on('storan_anggota');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
{
    Schema::table('gaji', function (Blueprint $table) {
        $table->dropForeign(['storan_id']);
        $table->dropForeign(['storan_anggota_id']);
        $table->dropColumn(['storan_id', 'storan_anggota_id']);
    });
}
};
