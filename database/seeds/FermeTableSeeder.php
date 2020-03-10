<?php
/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Illuminate\Database\Seeder;

class FermeTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $agriculteurs = App\Agriculteur::all();
    foreach ($agriculteurs as $agriculteur) {
      factory(App\Ferme::class, 1)
        ->create(['agriculteur_id' => $agriculteur->id])
        ->each(function ($ferme) {
          $faker = Faker\Factory::create();
          $userId = App\User::all()->random()->id;
          $ferme->commentaires()->attach('', [
            'ferme_id' => $ferme->id,
            'utilisateur_id' => $userId,
            'commentaire' => $faker->paragraph
          ]);
          $ferme->notes()->attach('', [
            'ferme_id' => $ferme->id,
            'utilisateur_id' => $userId,
            'nb_etoile' => rand(1,5)
          ]);
        });
    }
  }
}
