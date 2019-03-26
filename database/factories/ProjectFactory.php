<?php

use Faker\Generator as Faker;

$factory->define(App\Project::class, function (Faker $faker) {
    return [
        'user_id' => App\User::all()->random()->id,
        'name' => $faker->sentence($nbWords = 2, $variableNbWords = true),
    ];
});