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
        schema::create('tipe_rumah', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nomor_tipe', 15);
            $table->string('keterangan', 50)->nullable();
            $table->integer('biaya');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        schema::dropIfExists('tipe_rumah');
    }
};
