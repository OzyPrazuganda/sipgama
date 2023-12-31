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
        schema::create('inventaris', function (Blueprint $table) {
            $table->increments('id', 6);
            $table->string('nama_barang', 15);
            $table->integer('jumlah');
            $table->enum('kondisi', ['rusak', 'hilang', 'ganti']);
            $table->string('keterangan', 50)->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        schema::dropIfExists('inventaris');
    }
};
