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
    Schema::create('gaji', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('agent_id');
        $table->unsignedBigInteger('user_id')->nullable();
        $table->decimal('total', 15, 2);
        $table->timestamps();

        $table->foreign('agent_id')->references('id')->on('agent');
        $table->foreign('user_id')->references('id')->on('user');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gaji');
    }
};
