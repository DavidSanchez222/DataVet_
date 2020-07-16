<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'barcode' => $faker->isbn13,
        'description' => $faker->sentence(30),
        'price' => $faker->numberBetween(50, 100000),
        'iva' => $faker->randomFloat(2,0,100),
        'categorie_id' => rand(1,3)
    ];
});
