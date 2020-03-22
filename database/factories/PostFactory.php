<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use App\User;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(),
        'desc' => $faker->sentence(20),
        'body' => $faker->text(800),
        'published' => 'published',
        'user_id' => function () {
            return factory(User::class)->create()->id;
        },
    ];
});