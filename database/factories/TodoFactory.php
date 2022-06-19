<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Todo;
use Faker\Generator as Faker;
use App\User;

$factory->define(Todo::class, function (Faker $faker) {
    return [
        'title' => $faker->text,
        'completed' => [true, false][random_int(0, 1)],
        'creator_id' => User::all()->random()->id
    ];
});
