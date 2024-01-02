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
        schema::create('rumah', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nomor_rumah', 3);
            $table->string('blok', 2);
            // $table->enum('blok', ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j']);
            $table->enum('status', ['huni', 'kosong']);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();

            $table->unsignedInteger('tipe_rumah_id');
            $table->foreign('tipe_rumah_id')->references('id')->on('tipe_rumah');
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
