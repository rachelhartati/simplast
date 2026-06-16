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
    Schema::table('agent_request', function (Blueprint $table) {
        $table->dropColumn('nama_barang');
    });

    Schema::table('agent_request', function(Blueprint $table){
        $table->foreignId('item_id')->nullable()->constrained('item')->onDelete('set null'); // ← typo sudah diperbaiki
    });
}

public function down(): void
{
    Schema::table('agent_request', function (Blueprint $table) {
        $table->dropColumn('item_id');
    });

    Schema::table('agent_request', function (Blueprint $table) {
        $table->string('nama_barang');
    });
}
};
