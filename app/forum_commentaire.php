<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class forum_commentaire extends Pivot
{
  public function repondes()
  {
    return $this->belongsToMany(User::class, 'forum_commentaire_reponde', 'forum_commentaire_id', 'client_id')
      ->withPivot('reponde')
      ->withTimestamps();
  }
}
