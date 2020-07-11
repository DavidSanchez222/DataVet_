<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\DocumentType;
use Faker\Generator as Faker;

$factory->define(DocumentType::class, function (Faker $faker) {
    return [
        'abbreviation' => $faker->lexify('??'),
        'name' => $faker->words($nb = 3, true)
    ];
});
