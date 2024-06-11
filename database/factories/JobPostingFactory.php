<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
        $assignmentLength = [$this->faker->numberBetween(1, 12) . ' months', 'Regular', 'Full Time', 'Part Time'];
        $photoLinks = [
            'https://www.redfin.com/blog/wp-content/uploads/2023/09/Sitka-alaska.jpg',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQxwL9if9H8D7e6bCLzDUFw6flzNhOaUUnjUpYjwvpgMw&s',
            'https://www.nps.gov/common/uploads/grid_builder/anch/crop16_9/2AEBB6D0-DED7-C590-BBF91C0E33EE7E9A.jpg?width=640&quality=90&mode=crop',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQpJzmscM8XxA9s-1R4MaiOy-KInKXB2UoVCPp5U8U6BQ&s',
            'https://youthjournalism.org/wp-content/uploads/2022/11/Alaska-first-city-Ketchikan-Parker-rszd.jpg',
            'https://www.cruisehive.com/wp-content/uploads/2021/08/anchorage14-696x463.jpg',
            'https://www.albomadventures.com/wp-content/uploads/2022/03/USA-Alaska-Anchorage-skyline-Depositphotos_530807232_L-400x300.jpeg'

        ];

        return [
            'job_title' => $this->faker->jobTitle,
            'profession' => $this->faker->word,
            'pay' => '$' . $this->faker->randomFloat(2, 20, 100) . ' / shift',
            'assignment_length' => $this->faker->randomElement($assignmentLength),
            'schedule' => $this->faker->word,
            'openings' => $this->faker->numberBetween(1, 10),
            'start_date' => $this->faker->date,
            'experience' => $this->faker->numberBetween(1, 20) . ' years and ' . $this->faker->numberBetween(1, 11) . ' months',
            'address' => $this->faker->address,
            'question_1' => $this->faker->sentence . "?",
            'question_2' => $this->faker->sentence . "?",
            'question_3' => $this->faker->sentence . "?",
            'job_description' => $this->faker->paragraph,
            'responsibilities' => $this->faker->paragraph,
            'requirements' => $this->faker->paragraph,
            'img_link' => $this->faker->randomElement($photoLinks),
            'job_id' => uniqid(),
            'status' => 'ACTIVE',
            'created_by' => 1,
        ];
    }
}
