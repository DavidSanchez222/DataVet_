<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\EntryLog;
use Faker\Generator as Faker;

$factory->define(EntryLog::class, function (Faker $faker) {
    return [
        'purchase_order' => $faker->numerify('###'),
        'product_id' => rand(1,3),
        'quantity' => $faker->randomDigit,
        'provider_id' => rand(1,3),
        'user_id' => 1,
    ];
});
