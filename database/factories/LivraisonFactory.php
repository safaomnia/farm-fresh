<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Livraison;
use Faker\Generator as Faker;

$factory->define(Livraison::class, function (Faker $faker) {
  return [
    'trajectoire' => $faker->word,
    'transport_id' => App\Transport::all()->random()->id
  ];
});
