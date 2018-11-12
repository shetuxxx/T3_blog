<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
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
        DB::table('categories')->truncate();

        App\Category::create([
            'title' => 'Laravel 5.6',
            'slug' => str_slug('Laravel 5.6')
        ]);
        App\Category::create([
            'title' => 'Laravel Must',
            'slug' => str_slug('Laravel Must')
        ]);
        App\Category::create([
            'title' => 'Laravel Errors in Migration',
            'slug' => str_slug('Laravel Errors in Migration')
        ]);
        App\Category::create([
            'title' => 'NodeJs toughest solution',
            'slug' => str_slug('NodeJs toughest solution')
        ]);
        App\Category::create([
            'title' => 'BoosStrap is best',
            'slug' => str_slug('BoosStrap is best')
        ]);
    }
}
