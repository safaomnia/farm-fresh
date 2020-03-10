<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Produit;
use Faker\Generator as Faker;

$factory->define(Produit::class, function (Faker $faker, $param) {
  return [
    'nom' => $faker->word,
    'prix' => $faker->randomNumber(),
    'stock' => $faker->randomNumber(),
    'image' => 'default.jpg',
    'description' => $faker->paragraph,
    'categorie_id' => App\Categorie::all()->random()->id,
    'ferme_id' => $param['ferme_id']
  ];
});
