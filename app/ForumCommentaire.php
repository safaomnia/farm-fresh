<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ForumCommentaire extends Pivot
{
  public function repondres()
  {
    return $this->belongsToMany(User::class, 'forum_commentaire_repondre', 'forum_commentaire_id', 'utilisateur_id')
      ->withPivot('repondre')
      ->withTimestamps();
  }
}
