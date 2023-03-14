<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Task;
use Faker\Generator as Faker;

$factory->define(Task::class, function (Faker $faker) {
    return [
        'title' => $faker->name(),
        'content' => $faker->text(),
        'status' => $faker->boolean(70),
        'remind_on' => $faker->dateTimeBetween('+1 day','+1 week')->format('Y-m-d')
    ];
});
