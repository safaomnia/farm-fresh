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
          for ($i = 0; $i < rand(3, 5); $i++) {
            $error = false;
            do {
              try {
                $ferme->avis()->attach('', ['client_id' => App\User::all()->random()->id, 'avis' => $faker->paragraph]);
              } catch (PDOException $Exception) {
                $error = true;
              }
            } while ($error = false);
          }
        });
    }
  }
}
