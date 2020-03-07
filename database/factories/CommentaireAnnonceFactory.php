<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\CommentaireAnnonce;
use Faker\Generator as Faker;

$factory->define(CommentaireAnnonce::class, function (Faker $faker) {
  return [
    'commentaire' => $faker->realText(),
    'annonce_id' => $faker->randomElement(DB::table('annonce')->select('id')->get())->id,
    'utilisateur_id' => $faker->randomElement(DB::table('utilisateur')->select('id')->get())->id,
    'created_at' => now(),
    'updated_at' => now()
  ];
});
