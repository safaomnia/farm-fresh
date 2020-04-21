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
      factory(App\categorie::class,10)
        ->create()
        ->each(function ($categorie) {
        for ($i = 0; $i < rand(3, 7); $i++) {
          //$categorie->produits()->sync([App\produit::all()->random()->id, $categorie->id]);
        }
      });
    }
}
