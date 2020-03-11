<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Livraison extends Model
{
  public $table = 'livraison';
  protected $fillable = [
    'trajectoire'
  ];

  public function transport()
  {
    return $this->belongsTo(Transport::class);
  }
}
