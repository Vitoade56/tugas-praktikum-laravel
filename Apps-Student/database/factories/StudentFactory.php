<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nim' => fake()->unique()->numerify('2026########'),
            'nama' => fake()->name(),
            'jurusan' => fake()->randomElement(['Sistem Informasi', 'Teknik Informatika', 'Manajemen', 'Akuntansi']),
            'alamat' => fake()->address(),
        ];
    }
}