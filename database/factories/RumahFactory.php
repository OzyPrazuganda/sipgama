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
            'blok' => $this->faker->randomElement(['blok a', 'blok b', 'blok c', 'blok d', 'blok e', 'blok f', 'blog g', 'blok h', 'blok i', 'blok j']),
            'status' => $this->faker->randomElement(['kosong', 'huni']),
            'tipe_rumah_id' => mt_rand(1, 5),
        ];
    }
}
