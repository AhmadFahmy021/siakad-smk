<?php

namespace Database\Factories;

use App\Models\Classroom;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
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
            'user_id' => User::all()->random()->id,
            'nis' => $faker->randomNumber(5, true),
            'alamat' => $faker->streetAddress(),
            'ayah' => $faker->name(),
            'ibu' => $faker->name(),
            'wali' => $faker->name(),
            'classroom_id' => Classroom::all()->random()->id,
        ];
    }
}
