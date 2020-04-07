<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Charge;
use Faker\Generator as Faker;

$factory->define(Charge::class, function(Faker $faker) {
    return [
        'start'   => $faker->dateTime,
        'end'     => $faker->dateTime,
        'unit_id' => factory(App\Unit::class),
    ];
});
