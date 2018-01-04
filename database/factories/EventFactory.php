<?php

use Faker\Generator as Faker;

$factory->define(App\Event::class, function (Faker $faker) {
    return [
        'title' => $faker->city,
        'date' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+1 week'),
        'location' => $faker->streetAddress
    ];
});
