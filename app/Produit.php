<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class produit extends Model
{
  public $table = 'produit';
  protected $fillable = [
    'nom', 'prix', 'stock', 'image', 'description'
  ];

  public function ferme()
  {
    return $this->belongsTo(ferme::class);
  }

  public function commandes()
  {
    return $this->belongsToMany(User::class, 'commande', 'produit_id', 'client_id')
      ->using(commande::class)
      ->withPivot('total', 'etat', 'livraison_id')
      ->withTimestamps();
  }

  public function categories()
  {
    return $this->belongsToMany(categorie::class, 'produit_categorie', 'categorie_id', 'produit_id')
      ->using(produit_categorie::class);
  }

  public function paniers()
  {
    return $this->belongsToMany(panier::class, 'produit_panier', 'produit_id', 'panier_id')->withTimestamps();
  }

  public function notes()
  {
    return $this->belongsToMany(User::class, 'produit_note', 'produit_id', 'client_id')
      ->withPivot('etoiles')
      ->using(produit_note::class)
      ->withTimestamps();
  }
}
