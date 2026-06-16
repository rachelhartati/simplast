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
    // Ubah nama tabel
    Schema::rename('agent_returns', 'storan');

    // Tambah kolom baru
    Schema::table('storan', function (Blueprint $table) {
        $table->decimal('harga_per_pcs', 10, 2)->after('item_id');
        $table->decimal('total', 10, 2)->after('harga_per_pcs');
        $table->enum('status', ['disetorkan', 'belum_disetorkan'])->default('belum_disetorkan')->after('total');
    });
}

public function down(): void
{
    // Rollback kolom dulu sebelum rename balik
    Schema::table('storan', function (Blueprint $table) {
        $table->dropColumn(['harga_per_pcs', 'total', 'status']);
    });

    Schema::rename('storan', 'agent_returns');
}
};
