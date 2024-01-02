<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $nik = $this->faker->NIK();

        return [
            'no_kk' => (string) $this->faker->randomNumber(9, true),
            'nik' => $nik,
            'name' => $this->faker->name,
            'role' => $this->faker->randomElement(['warga']),
            'no_telp' => $this->faker->phoneNumber(),
            'tempat_lahir' => $this->faker->sentence(1),
            'tanggal_lahir' => $this->faker->date(),
            'jenis_kelamin' => $this->faker->randomElement(['L', 'P']),
            'agama' => $this->faker->randomElement(['islam', 'kristen', 'buddha', 'hindu', 'konghuchu']),
            'pendidikan_terakhir' => $this->faker->randomElement(['SD', 'SMP', 'SMA', 'S1', 'S2', 'S3']),
            'pekerjaan' => $this->faker->randomElement(['karyawan_swasta', 'petani', 'wiraswasta', 'pns', 'guru/dosen', 'pengemudi', 'tenaga_medis', 'nelayan', 'lainnya']),
            'password' => $nik,
            'rumah_id' => mt_rand(1, 170)
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
