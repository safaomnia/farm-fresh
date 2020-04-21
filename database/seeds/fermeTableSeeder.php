<?php
/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Illuminate\Database\Seeder;

class fermeTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $agriculteurs = App\agriculteur::all();
    foreach ($agriculteurs as $agriculteur) {
      factory(App\ferme::class, 1)
        ->create(['agriculteur_id' => $agriculteur->id])
        ->each(function ($ferme) {
          $faker = Faker\Factory::create();
          $clientId = App\User::all()->random()->id;
          for ($i = 0; $i < rand(3, 7); $i++) {
            $ferme->avis()->attach('', [
              'ferme_id' => $ferme->id,
              'client_id' => $clientId,
              'avis' => $faker->paragraph
            ]);
          }
        });
    }
  }
}
