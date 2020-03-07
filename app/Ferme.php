<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ferme extends Model
{
    public $table = 'ferme';

    public function utilisateurNotes() {
      return $this->belongsToMany(User::class);
    }

    public function utilisateurCommentaires(){
      return $this->belongsToMany(User::class);
    }
}
