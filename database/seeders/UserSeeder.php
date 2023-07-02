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
        User::query()->create([
            'name' => 'Rudolf',
            'email' => 'jojo@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'admin'
        ]);
        User::query()->create([
            'name' => 'Maral',
            'email' => 'Maral@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'cook'
        ]);
    }
}
