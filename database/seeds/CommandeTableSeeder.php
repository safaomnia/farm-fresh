<?php

use Illuminate\Database\Seeder;

class CommandeTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $clients = App\Client::all();
    foreach ($clients as $client) {
      $faker = Faker\Factory::create();
      $client->commandes()->attach('', [
        'quantite' => $faker->randomNumber(),
        'preparate' => $faker->randomElement(['en cours', 'preparé']),
        'livraison_id' => App\Livraison::all()->random()->id,
        'client_id' => $client->id,
        'produit_id' => App\User::all()->random()->id
      ]);
    }
  }
}
