<?php

namespace Database\Seeders;

use App\Models\ApplicationStatus;
use App\Models\Category;
use App\Models\Employer;
use App\Models\Job;
use App\Models\Jobseeker;
use App\Models\JobTagList;
use App\Models\Location;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Database\Factories\JobseekerFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        User::truncate(); //Truncating only needed if we don't migrate:fresh at the start
//        Post::truncate();
//        Category::truncate();
        $this->call(LocationSeeder::class);
        $this->call(TagSeeder::class);
        $this->call(ApplicationStatusSeeder::class);

        $user= User::factory()->create([
            'name'=>'JOMS Admin', //when you want a specific value in the auto-generated database table
            'username'=>'BeckyJames',
            'email' => 'becky@gmail.com',
            'password'=> 'beckyjames',
            'role'=>"Employer",
            'location_id'=>Location::inRandomOrder()->limit(1)->get()->first()->id
        ]);
        Employer::factory()->create([
           'user_id'=>$user->id,
        ]);

//        JobTagList::factory(3)->create([
//            'job_id' => Job::factory()->create([
//                'user_id'=>$user->id,
//            ]),
//        ]);
//        JobTagList::factory(2)->create([
//            'job_id' => Job::factory()->create([
//                'user_id'=>$user->id,
//            ]),
//        ]);

//        for($i = 0; $i<5;$i++){
//            $strings = array(
//                'Jobseeker',
//                'Employer',
//            );
//            $key = array_rand($strings);
//            $author=User::factory()->create([
//                'role'=>$strings[$key],
//            ]);
//            if($strings[$key]=='Jobseeker'){
//                Jobseeker::create([
//                    'user_id'=>$author->id,
//                ]);
//            }elseif($strings[$key]=='Employer'){
//                Employer::create([
//                    'user_id'=>$author->id,
//                ]);
//            }
//            JobTagList::factory()->create([
//                'job_id' => Job::factory()->create([
//                    'user_id'=>$author->id,
//                ]),
//            ]);
//        }



//        Job::factory(5)->create([
//            'user_id'=> $user->id //when you use a generated value to be inserted here
//        ]);
//
//        $job = Job::factory()->create();
//
//        JobTagList::factory(5)->create([
//            'job_id'=> $job->id
//        ]);
//        JobTagList::factory(5)->create();

//        $personal = Category::create([
//            'name' => 'Personal',
//            'slug' => 'personal'
//         ]);
//
//        $family = Category::create([
//            'name' => 'Family',
//            'slug' => 'family'
//        ]);
//
//        $work = Category::create([
//            'name' => 'Work',
//            'slug' => 'work'
//        ]);
//
//        Post::create([
//            'user_id' => $user->id,
//            'category_id' => $family->id,
//            'title' => 'My Family Post',
//            'slug' => 'my-first-post',
//            'excerpt' => '<p>Lorem ipsum dolar sit amet.</p>',
//            'body' => '<p>Lorem ipsum dolar sit amet, consectetur somse thing shgitne thing sheogn thisng snfjttn</p>'
//        ]);
//
//        Post::create([
//            'user_id' => $user->id,
//            'category_id' => $work->id,
//            'title' => 'My Work Post',
//            'slug' => 'my-second-post',
//            'excerpt' => '<p>Lorem ipsum dolar sit amet.</p>',
//            'body' => '<p>Lorem ipsum dolar sit amet, consectetur somse thing shgitne thing sheogn thisng snfjttn</p>'
//        ]);
    }
}
