<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Livreur extends Model
{
  public $table = 'livreur';
  public $timestamps = false;

  protected $fillable = [
    'entreprise', 'telephone', 'adresse'
  ];

  public function livraisons()
  {
    return $this->hasMany(Livraison::class);
  }

  public function transports()
  {
    return $this->hasMany(Transport::class);
  }
}
