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
    // making tables empty
    DB::statement('SET FOREIGN_KEY_CHECKS=0;');
    DB::table('utilisateur')->truncate();
    DB::table('client')->truncate();
    DB::table('livreur')->truncate();
    DB::table('livraison')->truncate();
    DB::table('transport')->truncate();
    DB::table('agriculteur')->truncate();
    DB::table('forum')->truncate();
    DB::table('forum_commentaire')->truncate();
    DB::table('forum_commentaire_repondre')->truncate();
    DB::table('categorie')->truncate();
    DB::table('ferme')->truncate();
    DB::table('ferme_avis')->truncate();
    DB::table('produit_note')->truncate();
    DB::table('produit')->truncate();
    DB::table('commande')->truncate();
    DB::table('panier')->truncate();
    DB::table('panier_produit')->truncate();
    DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    //seeding tables
    $this->call(UsersTableSeeder::class);
    $this->call(ForumTableSeeder::class);
    $this->call(CategorieTableSeeder::class);
    $this->call(FermeTableSeeder::class);
    $this->call(ProduitTableSeeder::class);
    $this->call(ProduitNoteTableSeeder::class);
    $this->call(TransportTableSeeder::class);
    $this->call(LivraisonTableSeeder::class);
    $this->call(CommandeTableSeeder::class);
    $this->call(PanierTableSeeder::class);
  }
}
