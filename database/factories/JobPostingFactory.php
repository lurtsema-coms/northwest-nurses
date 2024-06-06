<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JobPosting>
 */
class JobPostingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'job_title' => $this->faker->jobTitle,
            'profession' => $this->faker->word,
            'pay' => $this->faker->randomFloat(2, 20, 100),
            'assignment_length' => $this->faker->numberBetween(1, 12) . ' months',
            'schedule' => $this->faker->word,
            'openings' => $this->faker->numberBetween(1, 10),
            'start_date' => $this->faker->date,
            'experience' => $this->faker->numberBetween(1, 20) . ' years',
            'address' => $this->faker->address,
            'question_1' => $this->faker->sentence,
            'question_2' => $this->faker->sentence,
            'question_3' => $this->faker->sentence,
            'job_description' => $this->faker->paragraph,
            'responsibilities' => $this->faker->paragraph,
            'requirements' => $this->faker->paragraph,
            'img_link' => 'https://www.w3schools.com/css/paris.jpg',
            'job_id' => Str::uuid(),
            'status' => 'ACTIVE',
            'created_by' => 1,
        ];
    }
}
