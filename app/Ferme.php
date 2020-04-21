<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ferme extends Model
{
  public $table = 'ferme';
  protected $fillable = [
    'nom', 'adresse', 'description'
  ];

  public function avis()
  {
    return $this->belongsToMany(User::class, 'ferme_avis', 'ferme_id', 'client_id')
      ->withPivot('commentaire')
      ->withTimestamps();
  }

  public function produits()
  {
    return $this->hasMany(produit::class);
  }

  public function agriculteur()
  {
    return $this->belongsTo(agriculteur::class);
  }
}
