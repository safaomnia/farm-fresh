<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\AnnonceCommentaire;
use Faker\Generator as Faker;

$factory->define(AnnonceCommentaire::class, function (Faker $faker, $params) {
  return [
    'commentaire' => $faker->realText(),
    'annonce_id' => $params['annonce_id'],
    'utilisateur_id' => $faker->randomElement(DB::table('utilisateur')->select('id')->get())->id,
    'created_at' => now(),
    'updated_at' => now()
  ];
});
