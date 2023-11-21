<?php

namespace Database\Factories;

use App\Models\Classroom;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
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
            "name" => $faker->name(),
            "classroom_id" => Classroom::all()->random()->id,
            "subject_id" => Subject::all()->random()->id,
            'description' => $faker->paragraph(),
            "deadline" => $faker->dateTime(),
        ];
    }
}
