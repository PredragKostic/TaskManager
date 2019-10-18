<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'user_id'    => rand(1,10),
        'task_id'    => rand(1,200),
        'content'    => $faker->paragraph(2),
        'is_visible' => rand(0,1),
        'created_at' => $faker->dateTimeBetween('-30 days', 'now')
    ];
});
