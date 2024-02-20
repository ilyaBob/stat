<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'name' => 'adminadmin',
            'role' => 'admin',
            'email' => 'admin@admin.admin',
            'password' => '$2y$12$A2yE0aCBGrw80gpOev6R0Olz6rYMI2wj74cDVV64z1Akll2jDmvLC',
        ]);
    }
}
