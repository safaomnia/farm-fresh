<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
  use Notifiable;
  public $table = 'client';
  public $timestamps = false;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'id'
  ];

  public function commandes()
  {
     return $this->belongsToMany(Produit::class, 'commande', 'client_id', 'produit_id')
      ->using(Commande::class)
      ->withPivot('quantite', 'valide', 'livraison_id')
      ->withTimestamps();
  }
}
