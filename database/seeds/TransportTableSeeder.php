<?php

use Illuminate\Database\Seeder;

class TransportTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $livreurs = App\Livreur::all();
    foreach ($livreurs as $livreur) {
      $livreur->transports()->saveMany(factory(App\Transport::class, rand(2, 5))->make(['livreur_id' => $livreur->id]));
    }
  }
}
