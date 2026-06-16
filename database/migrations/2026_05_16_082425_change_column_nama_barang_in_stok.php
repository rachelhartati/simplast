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
    Schema::table('stok', function (Blueprint $table) {
        // 1. Hapus kolom nama_barang dulu
        $table->dropColumn('nama_barang');
    });

    Schema::table('stok', function (Blueprint $table) {
        $table->foreignId('item_id')->nullable()->constrained('item')->onDelete('set null');
    });
}

public function down(): void
{
    Schema::table('stok', function (Blueprint $table) {
        $table->dropForeign(['item_id']);
        $table->dropColumn('item_id');
    });

    Schema::table('stok', function (Blueprint $table) {
        $table->string('nama_barang');
    });
}
};
