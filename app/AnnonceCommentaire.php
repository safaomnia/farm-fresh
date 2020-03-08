<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnnonceCommentaire extends Model
{
  public $table = 'commentaire_annonce';

  public function annonce()
  {
    return $this->belongsTo(Annonce::class);
  }

  public function user()
  {
    return $this->belongsTo(User::class);
  }
}
