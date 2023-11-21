<?php

namespace Database\Seeders;

use App\Models\SubjectMaterial;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectMaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SubjectMaterial::factory(7)->create();
    }
}
