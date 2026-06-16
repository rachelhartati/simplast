<?php use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('agent_returns', function (Blueprint $table) {
                $table->id();

                $table->foreignId('agent_id')->nullable()->constrained('agent')->onDelete('set null');

                $table->foreignId('item_id')->nullable()->constrained('item')->onDelete('set null');

                $table->integer('jumlah_kg');
                $table->integer('harga_per_kg');
                $table->integer('total_gaji');

                $table->date('tanggal_return');

                $table->timestamps();
            }

        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('agent_returns');
    }
}

;
