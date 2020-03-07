<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    $this->call(UsersTableSeeder::class);
    $this->call(AgriculteurTableSeeder::class);
    $this->call(CategorieTableSeeder::class);
    $this->call(ClientTableSeeder::class);
    $this->call(AnnonceTableSeeder::class);
  }
}
