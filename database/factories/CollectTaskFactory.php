<?php

namespace Database\Factories;

use App\Models\Student;
use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CollectTask>
 */
class CollectTaskFactory extends Factory
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
            'task_id' => Task::all()->random()->id,
            'student_id' =>Student::all()->random()->id,
            'description' => $faker->paragraph(),
            'nama_file' => $faker->mimeType(),
            'link' => $faker->url(),
        ];
    }
}
