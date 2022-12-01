<?php


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //reset the users tableB
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('users')->truncate();
         $faker = \Faker\Factory::create();
        //generate three authors
        DB::table('users')->insert([
            [
                'name' => 'Ola olu',
                'slug' => 'ola-olu',
                'user_type' => 'admin',
                'email' => 'admin@example.com',
                'password' => bcrypt('secret'),
                'bio'  =>  $faker->text(rand(250, 350))

            ],
            [
                'name' => 'Ola olujimi',
                'slug' => 'ola-jimi',
                'user_type' => 'users',
                'email' => 'olujimi@example.com',
                'password' => bcrypt('secret'),
                'bio'  =>  $faker->text(rand(250, 350))

            ],
            [
                'name' => 'Ola olulode',
                'slug' => 'ola-lode',
                'user_type' => 'users',
                'email' => 'olulode@example.com',
                'password' => bcrypt('secret'),
                'bio'  =>  $faker->text(rand(250, 350))
            ],

            [
                'name' => 'Ola olulodemide',
                'slug' => 'ola-loded',
                'user_type' => 'users',
                'email' => 'olulodedd@example.com',
                'password' => bcrypt('secret'),
                'bio'  =>  $faker->text(rand(250, 350))
            ],


        ]);
    }
}
