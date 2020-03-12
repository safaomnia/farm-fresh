<?php

use Illuminate\Database\Seeder;

class PanierTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $users = App\User::all();
    foreach ($users as $user) {
      factory(App\Panier::class)
        ->create(['utilisateur_id' => $user->id])
        ->each(function ($panier) {
          for ($i = 0; $i < rand(5, 10); $i++) {
            $panier->produits()->sync([$panier->id, App\Produit::all()->random()->id]);
          }
        });
    }
  }
}
