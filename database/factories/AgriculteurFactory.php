<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Agriculteur;
use Faker\Generator as Faker;

$factory->define(Agriculteur::class, function (Faker $faker) {
  $user_ids = \DB::table('utilisateur')->select('id')->get();
  $id = $faker->unique()->randomElement($user_ids)->id;
  return [
    'id' => $id,
    'domaine' => $faker->text,
    'certification' => $faker->realText(200, 2)
  ];
});
