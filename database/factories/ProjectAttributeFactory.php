<?php

use Faker\Generator as Faker;

$factory->define(App\ProjectAttribute::class, function (Faker $faker) {
    return [
        'project_id' => App\Project::all()->random()->id,
        'name' => App\EavAttribute::all()->random()->attribute_code,
        'value' => $faker->sentence($nbWords = 2, $variableNbWords = true),
    ];
});
