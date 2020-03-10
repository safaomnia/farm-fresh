<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Agriculteur;
use Faker\Generator as Faker;

$factory->define(Agriculteur::class, function (Faker $faker, $param) {
  return [
    'id' => $param['id'],
    'domaine' => $faker->text,
    'certification' => $faker->realText(200, 2)
  ];
});
