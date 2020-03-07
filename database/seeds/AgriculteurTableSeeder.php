<?php

use Illuminate\Database\Seeder;

class AgriculteurTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(App\Agriculteur::class,15)->create();
    }
}
