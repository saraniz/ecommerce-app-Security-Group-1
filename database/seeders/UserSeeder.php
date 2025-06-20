<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'fullname' => 'Alice Johnson',
                'email' => 'alice@example.com',
                'password' => Hash::make('password123'),
                'is_verified' => true,
            ],
            [
                'fullname' => 'Bob Smith',
                'email' => 'bob@example.com',
                'password' => Hash::make('password123'),
                'is_verified' => false,
            ],
            [
                'fullname' => 'Charlie Davis',
                'email' => 'charlie@example.com',
                'password' => Hash::make('password123'),
                'is_verified' => true,
            ],
            [
                'fullname' => 'Diana Prince',
                'email' => 'diana@example.com',
                'password' => Hash::make('password123'),
                'is_verified' => true,
            ],
            [
                'fullname' => 'Evan Stone',
                'email' => 'evan@example.com',
                'password' => Hash::make('password123'),
                'is_verified' => false,
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}