<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
  public $table = "forum";
  protected $fillable = [
    'theme', 'description'
  ];
  public function user() {
    return $this->belongsTo(User::class);
  }
  public function commentaires()
  {
    return $this->belongsToMany(User::class, 'forum_commentaire', 'forum_id', 'utilisateur_id')
      ->withPivot('commentaire')
      ->withTimestamps();
  }
}
