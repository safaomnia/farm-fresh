<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ferme;
use Faker\Generator as Faker;

$factory->define(ferme::class, function (Faker $faker, $param) {
  return [
    'nom' => $faker->word,
    'adresse' => $faker->streetAddress,
    'description' => $faker->paragraph,
    'agriculteur_id' => $param['agriculteur_id']
  ];
});
