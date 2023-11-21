<?php

namespace Database\Seeders;

use App\Models\MaterialComplete;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MaterialCompleteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MaterialComplete::factory(10)->create();
    }
}
