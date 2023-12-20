<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Rumah;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DB::table('tipe_rumah')->insert([
            [
                'nomor_tipe' => 'Tipe Rumah 47',
                'keterangan' => '',
                'biaya' => '100000',
            ],
            [
                'nomor_tipe' => 'Tipe Rumah 55',
                'keterangan' => '',
                'biaya' => '125000',
            ],
            [
                'nomor_tipe' => 'Tipe Rumah 65',
                'keterangan' => '',
                'biaya' => '150000',
            ],
            [
                'nomor_tipe' => 'Tipe Rumah 96',
                'keterangan' => '',
                'biaya' => '175000',
            ],
            [
                'nomor_tipe' => 'Tipe Rumah 131',
                'keterangan' => '',
                'biaya' => '200000',
            ],
        ]);

        Rumah::factory(170)->create();

        // DB::table('rumah')->insert([
        //     [
        //         'nomor_rumah' => '132',
        //         'status' => 'huni',
        //         'tipe_rumah_id' => '2'
        //     ],
        //     [
        //         'nomor_rumah' => '145',
        //         'status' => 'huni',
        //         'tipe_rumah_id' => '1'
        //     ],
        //     [
        //         'nomor_rumah' => '112',
        //         'status' => 'huni',
        //         'tipe_rumah_id' => '4'
        //     ],
        //     [
        //         'nomor_rumah' => '022',
        //         'status' => 'huni',
        //         'tipe_rumah_id' => '3'
        //     ],
        //     [
        //         'nomor_rumah' => '332',
        //         'status' => 'kosong',
        //         'tipe_rumah_id' => '5'
        //     ]
        // ]);

        User::factory(1000)->create();

        DB::table('users')->insert([
            [
                'no_kk' => '445',
                'nik' => '001',
                'name' => 'Ozy Prazuganda',
                'role' => 'admin',
                'status' => 'pemilik',
                'no_telp' => '082248558913',
                'tempat_lahir' => 'TBA',
                'tanggal_lahir' => '2007-10-20',
                'jenis_kelamin' => 'L',
                'agama' => 'islam',
                'pendidikan_terakhir' => 'S1',
                'pekerjaan' => 'lainnya',
                'password' => bcrypt('password'),
                'rumah_id' => 2,
            ],
            [
                'no_kk' => '132',
                'nik' => '002',
                'name' => 'Hendo Prima Yudhistira',
                'role' => 'bendahara',
                'status' => 'penyewa',
                'no_telp' => '082248556654',
                'tempat_lahir' => 'TBA',
                'tanggal_lahir' => '2004-10-20',
                'jenis_kelamin' => 'L',
                'agama' => 'islam',
                'pendidikan_terakhir' => 'S1',
                'pekerjaan' => 'lainnya',
                'password' => bcrypt('password'),
                'rumah_id' => 1,
            ],
            [
                'no_kk' => '6889',
                'nik' => '003',
                'name' => 'Raldi Fitra Dewa',
                'role' => 'Pimpinan',
                'status' => 'pemilik',
                'no_telp' => '082248554432',
                'tempat_lahir' => 'TBA',
                'tanggal_lahir' => '2002-10-20',
                'jenis_kelamin' => 'L',
                'agama' => 'islam',
                'pendidikan_terakhir' => 'S1',
                'pekerjaan' => 'lainnya',
                'password' => bcrypt('password'),
                'rumah_id' => 3,
            ],
        ]);

        DB::table('metode_pembayaran')->insert([
            [
                'nomor_pembayaran' => '082248558913',
                'nama' => 'Villa Gading Mayang',
                'metode_pembayaran' => 'dana',
            ],
            [
                'nomor_pembayaran' => '081234567890',
                'nama' => 'Villa Gading Mayang',
                'metode_pembayaran' => 'gopay',
            ],
            [
                'nomor_pembayaran' => '082248558913',
                'nama' => 'Villa Gading Mayang',
                'metode_pembayaran' => 'shopeepay',
            ],
            [
                'nomor_pembayaran' => '081234567890',
                'nama' => 'Villa Gading Mayang',
                'metode_pembayaran' => 'qris',
            ],
            [
                'nomor_pembayaran' => '082248558913',
                'nama' => 'Villa Gading Mayang',
                'metode_pembayaran' => 'ovo',
            ],
            [
                'nomor_pembayaran' => '55074326',
                'nama' => 'Sari Pratiwi',
                'metode_pembayaran' => 'BCA',
            ],
        ]);

        DB::table('inventaris')->insert([
            [
                'nama_barang' => 'Tempat sampah',
                'jumlah' => '25',
                'kondisi' => 'rusak',
                'keterangan' => 'penggunaan',
            ],
            [
                'nama_barang' => 'ATP',
                'jumlah' => '8',
                'kondisi' => 'hilang',
                'keterangan' => '',
            ],
            [
                'nama_barang' => 'Komputer',
                'jumlah' => '1',
                'kondisi' => 'ganti',
                'keterangan' => 'perkantoran',
            ],
        ]);
    }
}
