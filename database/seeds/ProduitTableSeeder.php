<?php

use Illuminate\Database\Seeder;

class ProduitTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $fermes = App\Ferme::all();
    foreach ($fermes as $ferme) {
      $ferme->produits()->saveMany(factory(App\Produit::class, rand(5, 10))->make(['ferme_id' => $ferme->id]));
    }
  }
}
