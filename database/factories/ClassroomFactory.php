<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Classroom>
 */
class ClassroomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = fake('id_ID');
        return [
            "name" => $faker->randomElement(['X-RPLA', 'XII-RPLA', 'XI-RPLA', 'X-NIMA', 'XI-NIMA', 'XII-NIMA', 'X-KJA', 'XI-KJA', 'XII-KJA']),
            "guardian_teacher" => $faker->name(),
        ];
    }
}
