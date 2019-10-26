<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Time;
use Faker\Generator as Faker;

$factory->define(Time::class, function (Faker $faker) {
    return [
        'user_id'    => rand(1,10),
        'task_id'    => rand(1,200),
        'amount'    => $faker->dateTimeBetween('0 hours', '+8 hours'),
        'created_at' => $faker->dateTimeBetween('-30 days', '+30 days')
    ];
});
