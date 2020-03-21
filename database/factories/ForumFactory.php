<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Forum;
use Faker\Generator as Faker;

$factory->define(Forum::class, function (Faker $faker) {
  return [
    'theme' => $faker->text,
    'description' => $faker->paragraph,
    'utilisateur_id' => $faker->randomElement(\DB::table('utilisateur')->select('id')->get())->id
  ];
});
