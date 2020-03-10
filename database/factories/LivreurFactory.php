<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Livreur;
use Faker\Generator as Faker;

$factory->define(Livreur::class, function (Faker $faker, $param) {
  return [
    'id' => $param['id'],
    'entreprise' => $faker->word,
    'adresse' => $faker->streetAddress,
    'telephone' => $faker->e164PhoneNumber
  ];
});
