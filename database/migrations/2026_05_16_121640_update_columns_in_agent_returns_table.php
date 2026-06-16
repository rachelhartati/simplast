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
    Schema::table('agent_returns', function (Blueprint $table) {
        $table->dropColumn(['jumlah_kg', 'harga_per_kg', 'total_gaji']);
    });

    Schema::table('agent_returns', function (Blueprint $table) {
        $table->integer('jumlah_pcs')->after('item_id');
    });
}

public function down(): void
{
    Schema::table('agent_returns', function (Blueprint $table) {
        $table->dropColumn('jumlah_pcs');
    });

    Schema::table('agent_returns', function (Blueprint $table) {
        $table->integer('jumlah_kg')->after('item_id');
        $table->integer('harga_per_kg')->after('jumlah_kg');
        $table->integer('total_gaji')->after('harga_per_kg');
    });
}
};
