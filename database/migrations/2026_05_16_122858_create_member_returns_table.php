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
    Schema::create('member_returns', function (Blueprint $table) {
        $table->id();
        $table->foreignId('agent_job_id')->nullable()->constrained('agent_job')->onDelete('set null');
        $table->foreignId('user_id')->nullable()->constrained('user')->onDelete('set null');
        $table->foreignId('item_id')->nullable()->constrained('item')->onDelete('set null');
        $table->integer('jumlah_pcs');
        $table->date('tanggal_return');
        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('member_returns');
}
};
