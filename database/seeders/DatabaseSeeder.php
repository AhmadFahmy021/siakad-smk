<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            SubjectSeeder::class,
            UserSeeder::class,
            ClassroomSeeder::class,
            TeacherSeeder::class,
            StudentSeeder::class,
            ScheduleSeeder::class,
            AbsenSeeder::class,
            SubjectMaterialSeeder::class,
            SubjectGradeSeeder::class,
            MaterialCompleteSeeder::class,
            TaskSeeder::class,
            CollectTaskSeeder::class,
        ]);
    }
}
