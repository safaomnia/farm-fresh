<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categorie extends Model
{
  public $table = 'categorie';
  protected $fillable = [
    'nom'
  ];

  public function produits()
  {
    return $this->belongsToMany(produit::class, 'produit_categorie', 'produit_id', 'categorie_id')
      ->using(produit_categorie::class);
  }
}
