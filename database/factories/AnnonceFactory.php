<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Annonce;
use Faker\Generator as Faker;

$factory->define(Annonce::class, function (Faker $faker) {
  return [
    'text' => $faker->paragraph,
    'utilisateur_id' => $faker->randomElement(\DB::table('utilisateur')->select('id')->get())->id
  ];
});
