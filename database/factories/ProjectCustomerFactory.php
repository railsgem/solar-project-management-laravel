<?php

use Faker\Generator as Faker;

$factory->define(App\ProjectCustomer::class, function (Faker $faker) {
    return [
        'project_id' => App\Project::all()->random()->id,
        'name' => $faker->name,
        'contact_no' => $faker->phoneNumber,
        'post_code' => $faker->postcode,
        'address' => $faker->address,
    ];
});
