<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'email' => $faker->email(),
        'name' => $faker->name(),
        'body' => $faker->sentence(20),
    ];
});