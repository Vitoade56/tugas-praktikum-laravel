<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // Admin tetap untuk login
        Admin::create([
            'username' => 'admin',
            'password' => 'admin123',   // otomatis di-hash oleh casts di model
        ]);

        // 10 admin acak dengan Faker
        for ($i = 0; $i < 10; $i++) {
            Admin::create([
                'username' => fake()->unique()->userName(),
                'password' => 'password123',
            ]);
        }
    }
}