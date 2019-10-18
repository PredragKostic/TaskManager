<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Task;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Task::class, function (Faker $faker) {
    $title = $faker->sentence;
    return [
        'user_id'    => rand(1,10),
        'project_id' => rand(1,20),
        'title'    => $title,
        'slug'     => Str::slug($title),
        'content'    => $faker->paragraph(2),
        'is_visible' => rand(0,1),
        'is_done' => rand(0,1),
        'created_at' => $faker->dateTimeBetween('-30 days', 'now')
    ];
});
