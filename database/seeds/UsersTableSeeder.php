<?php

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

        //generate three authors
        DB::table('users')->insert([
            [
                'name' => 'Ola olu',
                'email' => 'ola@example.com',
                'password' => bcrypt('secret')
            
            ],
            [
                'name' => 'Ola olujimi',
                'email' => 'olujimi@example.com',
                'password' => bcrypt('secret')
            
            ],
            [
                'name' => 'Ola olulode',
                'email' => 'olulode@example.com',
                'password' => bcrypt('secret')
            
            ],

            
        ]);
    }
}
