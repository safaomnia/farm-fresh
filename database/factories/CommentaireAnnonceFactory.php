<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
  return [
    'id' => $faker->unique()->randomNumber(),
    'commentaire' => $faker->realText(),
    'annonce_id' => $faker->randomElement(DB::table('annonce')->select('id')->get())->id,
    'utilisateur_id' => $faker->randomElement(DB::table('utilisateur')->select('id')->get())->id,
    'created_at' => now(),
    'modified_at' => now()
  ];
});
