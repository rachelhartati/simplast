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
        Schema::table('storan', function (Blueprint $table) {
            $table->unsignedBigInteger('req_id')->nullable()->after('id');
             $table->foreign('req_id')->references('id')->on('agent_request');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('storan', function (Blueprint $table) {
            $table->dropForeign(['req_id']);
            $table->dropColumn('req_id');
        });
    }
};
