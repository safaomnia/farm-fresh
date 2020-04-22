<?php

use Illuminate\Database\Seeder;

class categorieTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    factory(App\categorie::class, 10)
      ->create()
      ->each(function ($categorie) {
        for ($i = 0; $i < rand(5, 10); $i++) {
          $error = false;
          do {
            try {
              $categorie->produits()->attach('', ['produit_id' => App\produit::all()->random()->id]);
            } catch (PDOException $Exception) {
              $error = true;
            }
          } while ($error = false);
        }
      });
  }
}
