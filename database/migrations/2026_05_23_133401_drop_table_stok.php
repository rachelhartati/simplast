<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::dropIfExists('stok');
}

public function down()
{
    // kalau mau bisa rollback, buat ulang tabelnya di sini
    Schema::create('stok', function (Blueprint $table) {
        $table->id();
        $table->timestamps();
    });
}
};
