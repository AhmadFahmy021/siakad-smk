<?php

namespace Database\Factories;

use App\Models\Classroom;
use App\Models\Subject;
use App\Models\SubjectMaterial;
use App\Models\Teacher;
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
            "name" => $faker->randomElement(['Membuat Database', 'Membuat program PHP', 'Membuat program java', 'Membuat program javascript', 'Membuat program dart', 'Membuat program HTML', 'Membuat Program web static', 'Membuat program web dinamis']),
            "classroom_id" => Classroom::all()->random()->id,
            "subject_id" => Subject::all()->random()->id,
            "teacher_id" => Teacher::all()->random()->id,
            "subjectmaterial_id" => SubjectMaterial::all()->random()->id,
            'description' => $faker->paragraph(),
            "deadline" => $faker->dateTime(),
        ];
    }
}
