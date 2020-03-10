<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transport extends Model
{
  public $table = 'transport';
  protected $fillable = [
    'nom', 'type'
  ];

  public function transports()
  {
    return $this->hasMany(Transport::class);
  }

  public function livraisons()
  {
    return $this->hasMany(Livraison::class);
  }
}
