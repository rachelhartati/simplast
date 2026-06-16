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
        Schema::create('agent_job', function (Blueprint $table) {
            $table->id();

            $table->foreignId('agent_id')->nullable()->constrained('agent')->onDelete('set null');
            $table->foreignId('user_id')->nullable()->constrained('user')->onDelete('set null');

            $table->string('kode_pengerjaan')->unique();
            $table->timestamp('tanggal_diberikan');
            $table->timestamp('tanggal_selesai')->nullable();
            $table->string('nama_barang');
            $table->integer('jumlah_barang');
            $table->string('status')->default('in_progress');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agent_job');
    }
};
