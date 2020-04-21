<?php

use Illuminate\Database\Seeder;

class produitNoteTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $produits = App\produit::all();
    foreach ($produits as $produit) {
      for ($i = 0; $i < rand(5, 10); $i++) {
        $produit->notes()->attach('', [
          'produit_id' => $produit->id,
          'client_id' => App\User::all()->random()->id,
          'nb_etoile' => rand(1, 5)
        ]);
      }
    }
  }
}
