<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rumah>
 */
class RumahFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nomor_rumah' => $this->faker->randomNumber(3, false),
            'blok' => $this->faker->randomElement(['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j']),
            'status' => $this->faker->randomElement(['kosong', 'huni']),
            'tipe_rumah_id' => mt_rand(1, 5),
        ];
    }
}
