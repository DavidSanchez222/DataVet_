<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Checkout;
use Faker\Generator as Faker;

$factory->define(Checkout::class, function (Faker $faker) {
    return [
        'invoice_number' => $faker->numerify('###'),
        'product_id' => rand(1,3),
        'quantity' => $faker->randomDigit,
        'user_id' => rand(1,3),
    ];
});
