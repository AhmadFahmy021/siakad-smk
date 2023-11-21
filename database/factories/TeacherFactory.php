<?php

namespace Database\Factories;

use App\Models\Subject;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
 */
class TeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "user_id" => User::all()->random()->id,
            "nip" => fake()->randomNumber(6,true),
            "subject_id" => Subject::all()->random()->id,
            'hp' => fake('id_ID')->phoneNumber() ,
            'alamat' => fake('id_ID')->streetAddress(),
        ];
    }
}
