<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
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
        User::create([
            'full_name' => 'Januardi Neky Putra',
            'email' => 'Jan@example.id',
            'username' => 'Januardi9',
            'password' => bcrypt('123'),
            'phone_number' => '0987654321',
            'role' => 'admin',
            'is_active' => 1
        ]);
    }
}
