<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Panier;
use Faker\Generator as Faker;

$factory->define(Panier::class, function (Faker $faker, $param) {
  return [
    'ipv4' => $faker->ipv4,
    'utilisateur_id' => $param['utilisateur_id']
  ];
});
