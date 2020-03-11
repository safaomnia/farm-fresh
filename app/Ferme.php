<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ferme extends Model
{
  public $table = 'ferme';
  protected $fillable = [
    'nom', 'adresse', 'contact', 'agriculteur_id'
  ];

  public function avis()
  {
    return $this->belongsToMany(User::class, 'ferme_avis', 'ferme_id', 'utilisateur_id')
      ->withPivot('commentaire')
      ->withTimestamps();
  }

  public function produits()
  {
    return $this->hasMany(Produit::class);
  }

  public function agriculteur()
  {
    return $this->belongsTo(Agriculteur::class);
  }
}
