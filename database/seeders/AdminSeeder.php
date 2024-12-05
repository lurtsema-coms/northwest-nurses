<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'test@admin.com'],
            [
                'email' => 'test@admin.com',
                'contact_number' => '1234567890',
                'address' => 'Head Office',
                'role' => 'admin',
                'email_verified_at' => date('Y-m-d H:i:s'),
                'password' => bcrypt('password')
            ]
        );
    }
}
