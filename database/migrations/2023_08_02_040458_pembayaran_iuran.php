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
        schema::create('pembayaran_iuran', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('bulan', ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12']);
            $table->date('bulan_berikut')->nullable();
            $table->integer('total_bayar');
            $table->string('bukti_pembayaran')->nullable();
            $table->enum('status', ['validasi', 'valid', 'invalid']);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();

            $table->unsignedInteger('warga_id');
            $table->unsignedInteger('rumah_id');
            $table->unsignedInteger('metode_pembayaran_id');
            $table->foreign('warga_id')->references('id')->on('users');
            $table->foreign('rumah_id')->references('id')->on('rumah');
            $table->foreign('metode_pembayaran_id')->references('id')->on('metode_pembayaran');
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
