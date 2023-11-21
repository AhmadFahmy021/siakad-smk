<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->count(10)->create();

        User::create([
            "name" => "Ahmad Fahmy",
            "username" => "fahmyga_21",
            "email" => "ahmad@ahmadfahmyga.my.id",
            "password" => Hash::make('12345678'),
            "role" => 'user',
        ]);
    }
}
