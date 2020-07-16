<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Provider;
use Faker\Generator as Faker;

$factory->define(Provider::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'rut_nit' => $faker->isbn13,
        'address' => $faker->address,
        'phones' => $faker->phoneNumber,
    ];
});
