<?php

use Illuminate\Database\Seeder;

class ProduitNoteTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $produits = App\Produit::all();
    foreach ($produits as $produit) {
      $produit->notes()->attach('', [
        'produit_id' => $produit->id,
        'utilisateur_id' => App\User::all()->random()->id,
        'nb_etoile' => rand(1, 5)
      ]);
    }
  }
}
