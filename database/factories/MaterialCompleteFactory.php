<?php

namespace Database\Factories;

use App\Models\SubjectMaterial;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MaterialComplete>
 */
class MaterialCompleteFactory extends Factory
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
            "subjectmaterial_id" => SubjectMaterial::all()->random()->id,
            "teacher_id" => Teacher::all()->random()->id,
            "status" => $faker->randomElement(['Selesai','Selesai Tidak Semua', 'Tertunda', 'Belu Selesai']),
            "description" => $faker->paragraph(),
        ];
    }
}
