<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Agriculteur extends Model
{
  public $table = 'agriculteur';
  public $timestamps = false;

  protected $fillable = [
    'id', 'domaine', 'certification'
  ];

  public function fermes()
  {
    return $this->hasMany(Ferme::class, 'agriculteur_id');
  }

  public function produits()
  {
    return $this->hasMany(Produit::class);
  }

  public function user()
  {
    return $this->belongsTo(User::class, 'id');
  }
}
