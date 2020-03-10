<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Transport;
use Faker\Generator as Faker;

$factory->define(Transport::class, function (Faker $faker, $param) {
  return [
    'nom' => $faker->word,
    'type' => $faker->word,
    'livreur_id' => $param['livreur_id'],
  ];
});
