<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ferme extends Model
{
  public $table = 'ferme';
  protected $fillable = [
    'nom', 'adresse', 'contact', 'agriculteur_id'
  ];

  public function notes()
  {
    return $this->belongsToMany(User::class, 'ferme_note', 'ferme_id', 'utilisateur_id')
      ->using(FermeNote::class)
      ->withPivot('nb_etoile');
  }

  public function commentaires()
  {
    return $this->belongsToMany(User::class, 'ferme_commentaire', 'ferme_id', 'utilisateur_id')
      ->using(FermeCommentaire::class)
      ->withPivot('commentaire')
      ->withTimestamps();
  }

  public function produits()
  {
    return $this->hasMany(Produit::class, 'ferme_id');
  }

  public function agriculteur()
  {
    return $this->belongsTo(Agriculteur::class, 'ferme_id');
  }
}
