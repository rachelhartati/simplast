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
    Schema::table('agent_job', function (Blueprint $table) {
        $table->dropColumn(['nama_barang', 'jumlah_barang']);
    });

    Schema::table('agent_job', function (Blueprint $table) {
        $table->foreignId('item_id')->nullable()->constrained('item')->onDelete('set null')->after('kode_pengerjaan');
        $table->integer('jumlah_karung')->after('item_id');
        $table->integer('jumlah_pcs')->nullable()->after('jumlah_karung');
    });
}

public function down(): void
{
    Schema::table('agent_job', function (Blueprint $table) {
        $table->dropForeign(['item_id']);
        $table->dropColumn(['item_id', 'jumlah_karung', 'jumlah_pcs']);
    });

    Schema::table('agent_job', function (Blueprint $table) {
        $table->string('nama_barang')->after('kode_pengerjaan');
        $table->integer('jumlah_barang')->after('nama_barang');
    });
}
};
