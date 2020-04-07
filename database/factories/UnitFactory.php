<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Unit;
use Faker\Generator as Faker;

$factory->define(Unit::class, function(Faker $faker) {
    $status = ['available', 'charging'];

    return [
        'name'     => $faker->name,
        'address'  => $faker->address,
        'postcode' => $faker->postcode,
        'status'   => $status[array_rand($status)],
    ];
});
