<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin user
        User::create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('admin123'),
        ]);

        // Regular user
        User::create([
            'name' => 'user',
            'email' => 'user@example.com',
            'password' => bcrypt('user123'),
        ]);

        // Seed some rooms
        \App\Models\Room::create([
            'room_number' => '101',
            'type' => 'Single',
            'price' => 100,
            'status' => 1,
        ]);

        \App\Models\Room::create([
            'room_number' => '102',
            'type' => 'Double',
            'price' => 150,
            'status' => 1,
        ]);

        \App\Models\Room::create([
            'room_number' => '201',
            'type' => 'Suite',
            'price' => 250,
            'status' => 1,
        ]);
    }
}
