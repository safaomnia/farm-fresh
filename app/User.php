<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
  use Notifiable;
  public $table = "utilisateur";
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'nom', 'penom', 'datenai', 'sexe', 'telephone', 'email', 'adresse', 'password', 'photo', 'type'
  ];
  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    'password', 'remember_token',
  ];

  /**
   * The attributes that should be cast to native types.
   *
   * @var array
   */
  protected $casts = [
    'email_verified_at' => 'datetime',
  ];

  public function forums()
  {
    return $this->hasMany(Forum::class);

  }

  public function forumCommentaires()
  {
    return $this->belongsToMany(Annonce::class, 'forum_commentaire', 'forum_id', 'utilisateur_id')->withTimestamps();
  }

  public function forumCommentaireRpondres()
  {
    return $this->belongsToMany(Annonce::class, 'forum_commentaire', 'forum_id', 'utilisateur_id')->withTimestamps();
  }

  public function panier()
  {
    return $this->hasOne(Panier::class);
  }

  public function fermeAvis()
  {
    return $this->belongsToMany(Ferme::class, 'ferme_avis', 'utilisateur_id', 'ferme_id')
      ->using(FermeAvis::class)
      ->withPivot('commentaire')
      ->withTimestamps();
  }

  public function ProduitNotes()
  {
    return $this->belongsToMany(Produit::class, 'produit_note')->withTimestamps();
  }
}
