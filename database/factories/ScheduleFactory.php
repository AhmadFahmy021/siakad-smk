<?php

namespace Database\Factories;

use App\Models\Classroom;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Schedule>
 */
class ScheduleFactory extends Factory
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
            "day" => $faker->randomElement(['Senin', 'Selasa', 'Rabu', 'Kamis', "Jum'at", 'Sabtu']),
            "time_start" => $faker->time(),
            "time_end" => $faker->time(),
            "room" => $faker->randomElement(['A01','A21','A31','B01','B21','B31','C01','C21','C31','D01','D21','D31']),
            "information" => $faker->paragraph(),
            "teacher_id" => Teacher::all()->random()->id,
            "classroom_id" => Classroom::all()->random()->id,
            "code" => $faker->randomNumber(2, true),
        ];
    }
}
