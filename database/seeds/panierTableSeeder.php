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
      factory(App\panier::class)
        ->create(['client_id' => $client->id])
        ->each(function ($panier) {
          for ($i = 0; $i < rand(1, 5); $i++) {
            $panier->produits()->sync([$panier->id,App\produit::all()->random()->id]);
          }
        });
    }
  }
}
