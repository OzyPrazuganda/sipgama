<?php

namespace App\Imports;

use App\Models\Rumah;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UserImports implements ToCollection, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function collection(collection $rows)
    {
        foreach ($rows as $row) {
            $rumah_id = Rumah::where('nomor_rumah', $row['rumah_id'])->first();

            if ($rumah_id != null) {
                User::create([
                    'no_kk' => $row['no_kk'],
                    'nik' => $row['nik'],
                    'name' => $row['name'],
                    'role' => $row['role'],
                    'status' => $row['status'],
                    'no_telp' => $row['no_telp'],
                    'tempat_lahir' => $row['tempat_lahir'],
                    'tanggal_lahir' => $row['tanggal_lahir'],
                    'jenis_kelamin' => $row['jenis_kelamin'],
                    'agama' => $row['agama'],
                    'pendidikan_terakhir' => $row['pendidikan_terakhir'],
                    'pekerjaan' => $row['pekerjaan'],
                    'password' => Hash::make($row['password']),
                    'rumah_id' => $rumah_id['id'],
                ]);
            }
        }
    }
}
