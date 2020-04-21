<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\produit;
use Faker\Generator as Faker;

$factory->define(produit::class, function (Faker $faker, $param) {
  return [
    'nom' => $faker->word,
    'prix' => $faker->randomFloat(),
    'stock' => $faker->randomNumber(),
    'image' => 'default.jpg',
    'description' => $faker->paragraph,
    'ferme_id' => $param['ferme_id']
  ];
});
