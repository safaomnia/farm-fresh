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
      ->each(function ($annonce) {
        $annonce->commentaires()->saveMany(factory(App\CommentaireAnnonce::class, rand(2, 5))->make(['annonce_id' => $annonce->id]));
      });
  }
}
