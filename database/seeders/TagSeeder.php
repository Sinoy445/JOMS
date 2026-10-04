<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([ //1
            'name' => 'Job Type',
            'slug' => 'JobType'
        ]);

        Tag::create([
            'name' => 'Full Time',
            'slug' => 'FullTime',
            'category_id' => 1
        ]);

        Tag::create([
            'name' => 'Part Time',
            'slug' => 'PartTime',
            'category_id' => 1
        ]);

        Tag::create([
            'name' => 'Temporary',
            'slug' => 'Temporary',
            'category_id' => 1
        ]);

        Tag::create([
            'name' => 'Internship',
            'slug' => 'Internship',
            'category_id' => 1
        ]);

        Tag::create([
            'name' => 'Odd Jobs',
            'slug' => 'OddJobs',
            'category_id' => 1
        ]);

        Category::create([ //2
            'name' => 'Job Experience',
            'slug' => 'JobExperience'
        ]);

        Tag::create([
            'name' => 'No Experience',
            'slug' => 'NoExperience',
            'category_id' => 2
        ]);

        Tag::create([
            'name' => 'Fresh Graduate',
            'slug' => 'FreshGraduate',
            'category_id' => 2
        ]);

        Tag::create([
            'name' => '1-2 years',
            'slug' => '1-2years',
            'category_id' => 2
        ]);

        Tag::create([
            'name' => '3-5 years',
            'slug' => '3-5years',
            'category_id' => 2
        ]);

        Tag::create([
            'name' => 'At least 5 years',
            'slug' => 'Atleast5years',
            'category_id' => 2
        ]);

        Category::create([ //3
            'name' => 'Sector',
            'slug' => 'Sector'
        ]);

        Tag::create([
            'name' => 'Engineering',
            'slug' => 'Engineering',
            'category_id' => 3
        ]);

        Tag::create([
            'name' => 'Retail',
            'slug' => 'Retail',
            'category_id' => 3
        ]);

        Tag::create([
            'name' => 'Finance',
            'slug' => 'Finance',
            'category_id' => 3
        ]);

        Tag::create([
            'name' => 'Computer Science',
            'slug' => 'ComputerScience',
            'category_id' => 3
        ]);
    }
}
