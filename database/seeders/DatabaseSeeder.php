<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'email' => 'test@employer.com',
            'contact_number' => '1234567890',
            'address' => '123 Employer St, Employertown, CA 90210',
            'role' => 'employer',
        ]);

        \App\Models\User::factory()->create([
            'email' => 'test@applicant.com',
            'contact_number' => '1234567890',
            'address' => '123 Applicant St, Applicantown, CA 90210',
            'role' => 'applicant',
        ]);
    }
}
