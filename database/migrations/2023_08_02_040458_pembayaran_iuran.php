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
        schema::create('pembayaran_iuran', function (Blueprint $table) {
            $table->id();
            $table->enum('bulan', ['1', '3', '6', '9']);
            $table->integer('total_bayar');
            $table->string('bukti_pembayaran')->nullable();
            $table->enum('status', ['validasi', 'valid', 'invalid']);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();

            $table->foreignId('rumah_id')->references('id')->on('rumah');
            $table->foreignId('metode_pembayaran_id')->references('id')->on('metode_pembayaran');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        schema::dropIfExists('pembayaran_rumah');
    }
};
