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
      for ($i = 0; $i < rand(3, 5); $i++) {
        $error = false;
        do {
          try {
            $produit->notes()->attach('', ['client_id' => App\User::all()->random()->id, 'nb_etoile' => rand(1, 5)]);
          } catch (PDOException $Exception) {
            $error = true;
          }
        } while ($error = false);
      }
    }
  }
}
