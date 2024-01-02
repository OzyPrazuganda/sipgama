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
        schema::create('permohonan_surat', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('jenis', ['Surat Pengantar Pembuatan SKCK', 'Surat Pengantar Mengurus KTP', 'Surat Pengantar Domisili', 'Surat Pengantar Kematian', 'Surat Pengantar Penelitian']);
            $table->string('nomor_surat', 11)->nullable();
            $table->enum('status', ['pengajuan', 'validasi', 'proses', 'selesai', 'batal']);
            $table->string('file')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();

            $table->unsignedInteger('users_id')->nullable();
            $table->foreign('users_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        schema::dropIfExists('permohonan_surat');
    }
};
