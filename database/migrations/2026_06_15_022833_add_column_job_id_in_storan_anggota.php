<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('storan_anggota', function (Blueprint $table) {
            $table->unsignedBigInteger('job_id')->nullable()->after('id');
            $table->foreign('job_id')->references('id')->on('agent_job')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('storan_anggota', function (Blueprint $table) {
            $table->dropForeign(['job_id']);
            $table->dropColumn('job_id');
        });
    }
};
