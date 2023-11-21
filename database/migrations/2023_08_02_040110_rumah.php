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
        schema::create('rumah', function (Blueprint $table) {
            $table->id();
            $table->integer('nomor_rumah');
            $table->enum('status', ['huni', 'kosong']);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();

            $table->foreignId('tipe_rumah_id')->references('id')->on('tipe_rumah');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        schema::dropIfExists('rumah');
    }
};
