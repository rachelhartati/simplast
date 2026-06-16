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
        Schema::create('agent', function (Blueprint $table) {
            $table->id();

            $table->string('kode_agent')->unique();
            $table->string('nama_agent');
            $table->string('alamat_agent');
            $table->string('no_tlp_agent');
            $table->integer('stok')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agent');
    }
};
