<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Panier extends Model
{
  public $table = 'panier';
  protected $fillable = [
    'ipv4'
  ];

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function produits()
  {
    return $this->belongsToMany(Produit::class);
  }
}
