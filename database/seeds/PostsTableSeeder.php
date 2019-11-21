<?php

use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //reset the database
        DB::table('posts')->truncate();

        $date = Carbon::create(2016,7,18,9);
        // genrate 10 posts

        $posts = [];
        $faker = Factory::create();
        for($i = 1; $i <= 10;  $i++)
        {
            $image = "Post_Image_" . rand(1,5). '.jpg';
            $date = $date->addDays($i);
            $publishedDate = clone($date);
            $createdDate = clone($date);
                $posts[] = [
                    'author_id' => rand(1, 3),
                    'title' =>   $faker->sentence(rand(8, 12)),
                    'excerpt' =>   $faker->text(rand(250, 350)),
                    'body' =>   $faker->paragraph(rand(10, 15), true),
                    'slug' => $faker->slug(),
                    'image' => rand(0,1) == 1 ? $image : NULL,
                    'created_at' => $createdDate,
                    'updated_at'  => $createdDate,
                    'published_at' => $i < 5 ? $publishedDate : ( rand(0,1) == 0 ? NULL : $publishedDate->addDays(4)),
                ];
        }
        DB::table('posts')->insert($posts);
    }
}
