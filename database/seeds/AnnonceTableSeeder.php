<?php

use Illuminate\Database\Seeder;

class AnnonceTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    factory(App\Annonce::class, 20)
      ->create()
      ->each(function ($annonce)
      {
        $faker = Faker\Factory::create();
        $annonce->commentaires()->attach('', [
          'annonce_id' => $annonce->id,
          'utilisateur_id' => App\User::all()->random()->id,
          'commentaire' => $faker->paragraph
        ]);
      });
  }
}
