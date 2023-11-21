<?php

namespace Database\Seeders;

use App\Models\SubjectGrade;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectGradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SubjectGrade::factory(7)->create();
    }
}
