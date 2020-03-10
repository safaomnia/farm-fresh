<?php

use Illuminate\Database\Seeder;

class LivraisonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(App\Livraison::class, rand(5,10))->create();
    }
}
