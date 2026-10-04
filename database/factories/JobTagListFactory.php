<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Job;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JobTagList>
 */
class JobTagListFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $category = Category::all()->random()->pluck('id');
        $tag = Tag::inRandomOrder()->limit(1)->get()->first()->id;
        return [
            'job_id' => Job::factory(),
            'tag_id' => $tag,
        ];
    }
}
