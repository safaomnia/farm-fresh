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
    return $this->belongsToMany(Client::class, 'commande', 'produit_id', 'client_id')
      ->using(Commande::class)
      ->withPivot('quantite', 'preparate', 'livraison_id')
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

  public function notes()
  {
    return $this->belongsToMany(User::class, 'produit_note', 'produit_id', 'utilisateur_id')
      ->withPivot('nb_etoile');
  }
}
