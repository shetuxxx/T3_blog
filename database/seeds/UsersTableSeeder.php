<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // reset the table
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('users')->truncate();

        $faker = Factory::create();

        App\User::create([
            'name' => 'ADMIN a',
            'slug' => str_slug('ADMIN a'),
            'bio' => $faker->text(rand(250, 300)),
            'email' => 'a@g.com',
            'password' => bcrypt('123456')
        ]);
        App\User::create([
            'name' => 'TAZ the boss',
            'slug' => str_slug('TAZ the boss'),
            'bio' => $faker->text(rand(250, 300)),
            'email' => 't@g.com',
            'password' => bcrypt('123456')
        ]);
        App\User::create([
            'name' => 'Edwin kailu',
            'slug' => str_slug('Edwin k'),
            'bio' => $faker->text(rand(250, 300)),
            'email' => 'e@g.com',
            'password' => bcrypt('123456')
        ]);
    }
}
