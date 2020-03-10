<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
  public $table = 'categorie';
  public $timestamps = false;
  protected $fillable = [
    'nom'
  ];

  public function produits()
  {
    return $this->hasMany(Produit::class);
  }
}
