<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
  public $table = 'categorie';
  protected $fillable = [
    'nom'
  ];

  public function produits()
  {
    return $this->hasMany(Produit::class);
  }
}
