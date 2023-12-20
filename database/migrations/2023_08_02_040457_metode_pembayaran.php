<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        schema::create('metode_pembayaran', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_pembayaran')->nullable();
            $table->string('nama');
            $table->enum('metode_pembayaran', ['bri', 'bca', 'mandiri', 'dana', 'gopay', 'shopeepay', 'ovo', 'qris', 'ditempat']);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        schema::dropIfExists('metode_pembayaran');
    }
};
