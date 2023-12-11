<?php

namespace Database\Factories;

use App\Models\Classroom;
use App\Models\Student;
use App\Models\Subject;
use App\Models\SubjectMaterial;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SubjectGrade>
 */
class SubjectGradeFactory extends Factory
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
            "student_id" => Student::all()->random()->id,
            "classroom_id" => Classroom::all()->random()->id,
            "subjectmaterial_id" => SubjectMaterial::all()->random()->id,
            "nilai_skill" => $faker->numberBetween(50,100),
            "nilai_test" => $faker->numberBetween(50,100),
            "nilai_attitude" => $faker->numberBetween(50,100),
            
        ];
    }
}
