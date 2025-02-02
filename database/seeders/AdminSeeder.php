<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // Adjust model if using a different one for admin
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'tesda@gmail.com'], // Ensure no duplicate admins
            [
                'name' => 'Admin',
                'email' => 'tesda@gmail.com',
                'password' => Hash::make('admin@123'), // Change this to a secure password
                'role' => 'admin', // Ensure you have a 'role' column in users table
                'logo' => 'images/logo/logo.png',
            ]
        );
    }
}
