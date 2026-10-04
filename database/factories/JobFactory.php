<?php

namespace Database\Factories;

use App\Models\Employer;
use App\Models\Jobseeker;
use App\Models\Location;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'location_id' => Location::all()->random(),
            'name' => $this->faker->sentence,
            'slug' => $this->faker->slug,
            'excerpt' => '<p>' . implode('</p><p>',$this->faker->paragraphs(2)) . '</p>',
            'description' => '<p>' . implode('</p><p>',$this->faker->paragraphs(6)) . '</p>',
            'skillNeeded' => '<p>' . implode('</p><p>',$this->faker->paragraphs(2)) . '</p>',
            'jobScope' => '<p>' . implode('</p><p>',$this->faker->paragraphs(4)) . '</p>'
        ];
    }
}
