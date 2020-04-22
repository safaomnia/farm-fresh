<?php

use Illuminate\Database\Seeder;

class panierTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $clients = App\User::all();
    foreach ($clients as $client) {
      factory(App\panier::class)->create(['client_id' => $client->id]);
    }
    $paniers = App\panier::all();
    foreach ($paniers as $panier) {
      for ($i = 0; $i < rand(3, 5); $i++) {
        $error = false;
        do {
          try {
            $panier->produits()->attach('', ['produit_id' => App\produit::all()->random()->id]);
          } catch (PDOException $Exception) {
            $error = true;
          }
        } while ($error = false);
      }
    }
  }
}
