<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    factory(App\User::class, 40)
      ->create()
      ->each(function ($user) {
        if ($user->type == 'client') {
          factory(App\Client::class)->create(['id' => $user->id]);
        } elseif ($user->type == 'agriculteur') {
          factory(App\Agriculteur::class)->create(['id' => $user->id]);
        } else {
          factory(App\Livreur::class)->create(['id' => $user->id]);
        }
      });
  }
}
