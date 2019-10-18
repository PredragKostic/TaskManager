<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Project;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Project::class, function (Faker $faker) {
	$title = $faker->sentence;
    return [
        'user_id'    => rand(1,10),
        'title'    => $title,
        'slug'     => Str::slug($title),
        'budget'   => rand(0,5000),
        'summary'    => $faker->paragraph(2),
        'is_visible' => rand(0,1),
        'created_at' => $faker->dateTimeBetween('-30 days', 'now')
    ];
});
