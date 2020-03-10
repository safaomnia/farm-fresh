<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Ferme;
use Faker\Generator as Faker;

$factory->define(Ferme::class, function (Faker $faker, $param) {
  return [
    'nom' => $faker->word,
    'adresse' => $faker->streetAddress,
    'contact' => $faker->word,
    'agriculteur_id' => $param['agriculteur_id']
  ];
});
