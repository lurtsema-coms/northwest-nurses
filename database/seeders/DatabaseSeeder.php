<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\JobPosting;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        $employer = \App\Models\User::factory()->create([
            'email' => 'test@employer.com',
            'contact_number' => '1234567890',
            'address' => '123 Employer St, Employertown, CA 90210',
            'role' => 'employer',
        ]);

        $employerDetail = \App\Models\EmployerDetail::create([
            'user_id' => $employer->id,
            'name' => 'Employer',
            'website' => 'https://www.employer.com',
        ]);

        $applicant = \App\Models\User::factory()->create([
            'email' => 'test@applicant.com',
            'contact_number' => '1234567890',
            'address' => '123 Applicant St, Applicantown, CA 90210',
            'role' => 'applicant',
        ]);

        $applicantDetail = \App\Models\ApplicantDetail::create([
            'user_id' => $applicant->id,
            'first_name' => 'Applicant',
            'last_name' => 'Test',
            'birthdate' => '2000-01-01',
            'sex' => 'male',
        ]);

        $applicant = \App\Models\User::factory()->create([
            'email' => 'test@applicant1.com',
            'contact_number' => '1234567890',
            'address' => '123 Applicant St, Applicantown, CA 90210',
            'role' => 'applicant',
        ]);

        $applicantDetail = \App\Models\ApplicantDetail::create([
            'user_id' => $applicant->id,
            'first_name' => 'Applicant1',
            'last_name' => 'Test',
            'birthdate' => '2000-01-01',
            'sex' => 'male',
        ]);

        JobPosting::factory()->count(20)->create();
    }
}
