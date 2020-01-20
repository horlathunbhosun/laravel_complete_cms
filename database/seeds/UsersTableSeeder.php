<?php


use Faker\Factory;
use Illuminate\Database\Seeder;

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
        $faker = Factory::create();
        //generate three authors
        DB::table('users')->insert([
            [
                'name' => 'Ola olu',
                'slug' => 'ola-olu',
                'email' => 'ola@example.com',
                'password' => bcrypt('secret'),
                'bio'  =>  $faker->text(rand(250, 350))
            
            ],
            [
                'name' => 'Ola olujimi',
                'slug' => 'ola-jimi',
                'email' => 'olujimi@example.com',
                'password' => bcrypt('secret'),
                'bio'  =>  $faker->text(rand(250, 350))
            
            ],
            [
                'name' => 'Ola olulode',
                'slug' => 'ola-lode',
                'email' => 'olulode@example.com',
                'password' => bcrypt('secret'),
                'bio'  =>  $faker->text(rand(250, 350))  
            ],

            
        ]);
    }
}
