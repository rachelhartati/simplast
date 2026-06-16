<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('agent_job', function (Blueprint $table) {
            $table->dropColumn(['kode_pengerjaan', 'tanggal_selesai', 'jumlah_pcs']);
            $table->renameColumn('jumlah_karung', 'jumlah');
        });
    }

    public function down(): void
    {
        Schema::table('agent_job', function (Blueprint $table) {
            $table->string('kode_pengerjaan');
            $table->timestamp('tanggal_selesai')->nullable();
            $table->integer('jumlah_pcs')->nullable();
            $table->renameColumn('jumlah', 'jumlah_karung');
        });
    }
};