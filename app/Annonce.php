<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
    public $table = "annonce";

    public function user() {
      return $this->belongsTo(User::class);
    }

    public function commentaires() {
      return $this->hasMany(CommentaireAnnonce::class);
    }
}
