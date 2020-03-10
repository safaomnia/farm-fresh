<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
  public $table = "annonce";
  protected $fillable = [
    'text', 'fichier'
  ];
  public function user() {
    return $this->belongsTo(User::class);
  }
  public function commentaires()
  {
    return $this->belongsToMany(User::class, 'annonce_commentaire', 'annonce_id', 'utilisateur_id')
      ->using(AnnonceCommentaire::class)
      ->withPivot('commentaire')
      ->withTimestamps();
  }
}
