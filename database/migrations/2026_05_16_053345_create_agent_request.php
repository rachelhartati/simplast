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
        Schema::create('agent_request', function (Blueprint $table) {
            $table->id();

            $table->foreignId('agent_id')->nullable()->constrained('agent')->onDelete('set null');
            $table->string('kode_request');
            $table->date('tanggal_request');
            $table->string('nama_barang');
            $table->integer('jumlah_barang');
            $table->string('status')->default('waiting');
            $table->string('note')->nullable();
            $table->timestamp('approved_at')->nullable();
           $table->foreignId('approved_by')->nullable()->constrained('user')->onDelete('set null');
            $table->timestamp('rejected_at')->nullable();
            $table->foreignId('rejected_by')->nullable()->constrained('user')->onDelete('set null');
            $table->string('rejected_reason')->nullable();
            $table->timestamp('received_at')->nullable();
            $table->string('foto_pemberian')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agent_request');
    }
};
