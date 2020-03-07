<?php

use Illuminate\Database\Seeder;

class AnnonceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(App\Annonce::class,50)->create();
    }
}
