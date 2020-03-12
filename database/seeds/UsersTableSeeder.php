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
        $faker = Faker\Factory::create();
        for ($i = 0; $i < rand(5, 10); $i++) {
          $user->emetteurs()->attach('', [
            'message' => $faker->paragraph,
            'fichier' => $faker->word . '.jpg',
            'emetteur_id' => $user->id,
            'recepteur_id' => App\User::all()->random()->id,
            'seen_at' => $faker->randomElement([NULL, now()])
          ]);
        }
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
