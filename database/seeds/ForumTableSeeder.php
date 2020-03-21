<?php

use Illuminate\Database\Seeder;

class ForumTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    factory(App\Forum::class, 20)
      ->create()
      ->each(function ($forum) {
        $faker = Faker\Factory::create();
        for ($i = 0; $i < rand(3, 7); $i++) {
          $forum->commentaires()->attach('', [
            'forum_id' => $forum->id,
            'utilisateur_id' => App\User::all()->random()->id,
            'commentaire' => $faker->paragraph
          ]);
        }
      });
    $commentaires = App\ForumCommentaire::all();
    foreach ($commentaires as $commentaire)
    {
      $faker = Faker\Factory::create();
      for ($i = 0; $i < rand(3, 7); $i++) {
        $commentaire->repondres()->attach('', [
          'forum_commentaire_id' => $commentaire->id,
          'utilisateur_id' => App\User::all()->random()->id,
          'repondre' => $faker->paragraph
        ]);
      }
    }
  }
}
