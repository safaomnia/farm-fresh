<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
  public $table = 'produit';
  protected $fillable = [
    'nom', 'prix', 'stock', 'image', 'description'
  ];

  public function ferme()
  {
    return $this->belongsTo(Ferme::class);
  }

  public function commandes()
  {
    return $this->belongsToMany(Client::class, 'commande', 'produit_id', 'Client_id')
      ->using(Commande::class)
      ->withPivot('quantite', 'valide', 'livraison_id')
      ->withTimestamps();
  }

  public function categorie()
  {
    return $this->belongsTo(Categorie::class);
  }
   public function paniers()
   {
      return $this->belongsToMany(Panier::class);
   }
}
