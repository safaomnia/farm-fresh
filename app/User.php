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
    'photo', 'nom', 'prenom', 'email', 'sexe', 'password'
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

  public function annonces() {
    return $this->hasMany(Annonce::class);
  }

  public function panier(){
    return $this->hasOne(Panier::class);
  }

  public function annonceCommentaires() {
    return $this->belongsToMany(Annonce::class, 'commentaire_annonce', 'utilisateur_id');
  }

  public function fermeCommentaires() {
    return $this->belongsToMany(Ferme::class);
  }

  public function fermeNotes() {
    return $this->belongsToMany(Ferme::class);
  }
}
