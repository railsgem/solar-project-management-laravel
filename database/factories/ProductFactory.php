<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence($nbWords = 2, $variableNbWords = true),
        'image' => $faker->imageUrl($width = 640, $height = 480),
        'price' => $faker->numberBetween($min = 1000, $max = 9000),
        'description' => $faker->sentence($nbWords = 50, $variableNbWords = true),
    ];
});
