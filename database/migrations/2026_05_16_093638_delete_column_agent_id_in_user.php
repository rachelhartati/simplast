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
    Schema::table('user', function (Blueprint $table) {
        $table->dropForeign(['agent_id']); // ← hapus foreign key dulu
        $table->dropColumn('agent_id');    // ← baru hapus kolom
    });
}
public function down(): void
{
    Schema::table('user', function (Blueprint $table) {
        // Tambah tanpa foreign key constraint dulu
        $table->unsignedBigInteger('agent_id')->nullable()->after('id');
    });
}

};
