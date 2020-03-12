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

  public function annonces()
  {
    return $this->hasMany(Annonce::class);
  }

  public function panier()
  {
    return $this->hasOne(Panier::class);
  }

  public function annonceCommentaires()
  {
    return $this->belongsToMany(Annonce::class, 'annonce_commentaire', 'annonce_id', 'utilisateur_id')->withTimestamps();
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

  public function emetteurs()
  {
    return $this->belongsToMany(User::class, 'messagerie', 'recepteur_id', 'emetteur_id')
      ->withPivot('message', 'fichier', 'seen_at')
      ->withTimestamps();
  }

  public function recepteurs()
  {
    return $this->belongsToMany(User::class, 'messagerie', 'emetteur_id', 'recepteur_id')
      ->withPivot('message', 'fichier', 'seen_at')
      ->withTimestamps();
  }
}
