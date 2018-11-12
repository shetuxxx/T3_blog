<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'user_id' => rand(1, 3),
        'category_id' => rand(1, 5),
        'title' => $faker->sentence(rand(2, 5)),
        'slug' => $faker->slug(),
        'excerpt' => $faker->paragraphs(3, true),
        'body' => $faker->paragraphs(rand(30, 50), true),
        'view_count' => rand(10, 100),
        'image' => 'https://picsum.photos/200/300/?random'
    ];
});
