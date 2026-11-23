<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Student;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Akun tetap untuk login
        Admin::create([
            'username' => 'admin',
            'password' => bcrypt('admin123'),
        ]);

        // Data dummy dengan Factory
        Admin::factory(5)->create();
        Student::factory(10)->create();
    }
}