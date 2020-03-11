<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transport extends Model
{
  public $table = 'transport';
  protected $fillable = [
    'nom', 'type'
  ];

  public function livreur()
  {
    return $this->belongsTo(Livreur::class);
  }

  public function livraisons()
  {
    return $this->hasMany(Livraison::class);
  }
}
