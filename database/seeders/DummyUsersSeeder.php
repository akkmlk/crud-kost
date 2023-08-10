<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data_users = [
            [
                'name' => "Jamal",
                'email' => fake()->freeEmail(),
                'password' => bcrypt("12345678"),
                'role' => "admin",
            ],
            [
                'name' => "Dudung",
                'email' => fake()->freeEmail(),
                'password' => bcrypt("12345678"),
                'role' => "staf",
            ],
            [
                'name' => "Jarwo",
                'email' => fake()->freeEmail(),
                'password' => bcrypt("12345678"),
                'role' => "staf",
            ],
        ];

        foreach ($data_users as $value) {
            User::create($value);
        }
    }
}
