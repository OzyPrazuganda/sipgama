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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('no_kk');
            $table->string('nik')->unique();
            $table->string('name');
            $table->enum('role', ['admin', 'pimpinan', 'bendahara', 'warga']);
            $table->enum('status', ['penyewa', 'pemilik']);
            $table->string('no_telp');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->enum('agama', ['islam', 'kristen', 'buddha', 'hindu', 'konghuchu']);
            $table->enum('pendidikan_terakhir', ['SD', 'SMP', 'SMA', 'S1', 'S2', 'S3']);
            $table->enum('pekerjaan', ['karyawan_swasta', 'petani', 'wiraswasta', 'PNS', 'guru/dosen', 'pengemudi', 'tenaga_medis', 'nelayan', 'lainnya']);
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            $table->foreignId('rumah_id')->references('id')->on('rumah')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
