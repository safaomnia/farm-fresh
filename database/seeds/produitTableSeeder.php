<?php

use Illuminate\Database\Seeder;

class produitTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $fermes = App\ferme::all();
    foreach ($fermes as $ferme) {
      $ferme->produits()->saveMany(factory(App\produit::class, rand(5, 10))->make(['ferme_id' => $ferme->id]));
    }
  }
}
