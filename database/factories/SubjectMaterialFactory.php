<?php

namespace Database\Factories;

use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SubjectMaterial>
 */
class SubjectMaterialFactory extends Factory
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
            "subject_id" => Subject::all()->random()->id,
            "name" => $faker->name(),
            "description" => $faker->paragraph(),
            "deadline" => $faker->date()
        ];
    }
}
