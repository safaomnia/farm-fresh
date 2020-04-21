<?php

namespace App;

use Illuminate\Database\Eloquent\Pivot;

class forum_commentaire extends Pivot
{
  public function repondres()
  {
    return $this->belongsToMany(User::class, 'forum_commentaire_reponde', 'forum_commentaire_id', 'client_id')
      ->withPivot('reponde')
      ->withTimestamps();
  }
}
